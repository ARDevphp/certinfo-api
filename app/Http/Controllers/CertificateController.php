<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Person;
use App\Models\Photo;
use App\Models\User;
use App\Models\Certificate;
use App\Mail\CertificateMail;
use App\Notifications\CertificateCreatedNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use App\Services\CertificateService;
use Illuminate\Http\Request;
use App\Http\Resources\CertificateResource;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{

    public function __construct(protected CertificateService $certificateService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $query = Certificate::query();

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('student_name', 'like', "%$search%")
                    ->orWhere('student_family', 'like', "%$search%")
                    ->orWhereHas('course', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            }

            if ($request->has('courseFinishedDate')) {
                $courseFinishedDate = $request->input('courseFinishedDate');

                if (isset($courseFinishedDate['before'])) {
                    $query->whereDate('created_at', '<=', $courseFinishedDate['before']);
                }

                if (isset($courseFinishedDate['after'])) {
                    $query->whereDate('created_at', '>=', $courseFinishedDate['after']);
                }
            }

            // Paginate
            $paginate = $query->paginate(11);

            return response()->json([
                'data' => CertificateResource::collection($paginate),
                'pagination' => [
                    'currentPage' => $paginate->currentPage(),
                    'lastPage' => $paginate->lastPage(),
                    'perPage' => $paginate->perPage(),
                    'total' => $paginate->total(),
                ]
            ]);
        } catch (\Exception $e) {
            return $this->response('error search');
        }
    }

    public function store(StoreCertificateRequest $request)
    {
        $user = User::where('email', $request->student_email)->first();
        $people = Person::where('user_id', $user->id)->first();

        $courseName = Course::findOrFail($request->course_id);
        $nextCertId = Certificate::max('id') + 1;

        $qrcodeSvgPath = $this->certificateService->generateQrCode($request->current_url . $nextCertId);

        $combinedSvgPath = $this->certificateService
            ->mergeQrWithTemplate($qrcodeSvgPath, $request->student_name, $request->student_family, $courseName->name);

        $photo = Photo::create(['path' => $combinedSvgPath]);

        $certificateData = array_merge($request->validated(), [
            'people_id' => $people->id,
            'file_path' => $photo->id,
        ]);

        $certificate = Certificate::create($certificateData);

//        Notification::send(auth()->user(), new CertificateCreatedNotification($post));
//
//        $certificate = Certificate::findOrFail($post);
//        Mail::to($request->student_email)->send(new CertificateMail($certificate));

        return response()->json([
            'message' => 'Certificate created and email sent!',
            'data' => ['id' => $certificate->id],
        ], 201);
    }

    public function show($certificate)
    {
        return $this->response(new CertificateResource(Certificate::where('id', $certificate)->firstOrFail()));
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $people = Person::findOrFail($certificate->people_id);
        $oldUser = User::findOrFail($people->user_id);

        $newUser = User::where('email', $request->student_email)->first();

        if (!$newUser) {
            return response()->json([
                'message' => 'User with this email does not exist'
            ], 404);
        }

        if ($newUser->id !== $oldUser->id) {
            $people->user_id = $newUser->id;
            $people->save();

            $certificate->people_id = $people->id;
        }

        if (
            $certificate->student_name !== $request->student_name ||
            $certificate->student_family !== $request->student_family ||
            $certificate->course_id !== $request->course_id
        ) {
            $photo = Photo::findOrFail($certificate->file_path);

            if (file_exists($photo->path)) {
                unlink($photo->path);
            }

            $qrcodeSvgPath = $this->certificateService->generateQrCode($request->current_url . $certificate->id);

            $courseName = Course::findOrFail($request->course_id);

            $combinedSvgPath = $this->certificateService->mergeQrWithTemplate(
                $qrcodeSvgPath,
                $request->student_name,
                $request->student_family,
                $courseName->name
            );

            $photo->update(['path' => $combinedSvgPath]);

            $certificate->file_path = $photo->id;
        }

        $certificate->student_email = $request->student_email;
        $certificate->student_name = $request->student_name;
        $certificate->student_family = $request->student_family;
        $certificate->practice = $request->practice;
        $certificate->certificate_protection = $request->certificate_protection;
        $certificate->course_id = $request->course_id;
        $certificate->save();

        return response()->json([
            'message' => 'Certificate updated successfully!',
            'data' => ['id' => $certificate->id],
        ], 200);
    }

    public function destroy($certificate): JsonResponse
    {
        Certificate::find($certificate)->delete();

        return $this->response(['message' => 'Certificate muvaffaqiyatli o\'chirildi!']);
    }
}
