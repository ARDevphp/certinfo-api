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

class CertificateController extends Controller
{

    public function __construct(protected CertificateService $certificateService)
    {
    }

    public function index(): JsonResponse
    {
        $paginate = Certificate::paginate(11);

        return response()->json([
            'data' => CertificateResource::collection($paginate),
            'pagination' => [
                'currentPage' => $paginate->currentPage(),
                'lastPage' => $paginate->lastPage(),
                'perPage' => $paginate->perPage(),
                'total' => $paginate->total(),
            ]
        ]);
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

    public function update(UpdateCertificateRequest $request, $id)
    {
        $certificate = Certificate::find($id);

        return $this->response(['message' => 'Certificate muvaffaqiyatli yangilandi!']);
    }

    public function destroy($certificate): JsonResponse
    {
        Certificate::find($certificate)->delete();

        return $this->response(['message' => 'Certificate muvaffaqiyatli o\'chirildi!']);
    }
}
