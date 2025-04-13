<?php

namespace App\Services\Certificate;

use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateSearchService
{
    public function __construct(
        protected Request $request,
    )
    {
    }

    public function getCertificatesData(): mixed
    {
        $query = Certificate::query();

        if ($this->request->has('search')) {
            $this->searchNamesAndCourses($query);
        }

        if ($this->request->has('courseFinishedDate')) {
            $this->courseFinishedDate($query);
        }

        return $query->paginate(11);
    }

    public function formatPagination($paginate): array
    {
        return [
            'data' => CertificateResource::collection($paginate),
            'pagination' => [
                'certCount' => Certificate::all()->count(),
                'currentPage' => $paginate->currentPage(),
                'lastPage' => $paginate->lastPage(),
                'perPage' => $paginate->perPage(),
                'total' => $paginate->total(),
            ]
        ];
    }

    private function searchNamesAndCourses($query): void
    {
        $search = $this->request->input('search');

        $query->where('student_name', 'like', "%$search%")
            ->orWhere('student_family', 'like', "%$search%")
            ->orWhereHas('course', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
    }

    private function courseFinishedDate($query): void
    {
        $courseFinishedDate = $this->request->input('courseFinishedDate');

        if (isset($courseFinishedDate['before'])) {
            $query->whereDate('created_at', '<=', $courseFinishedDate['before']);
        }

        if (isset($courseFinishedDate['after'])) {
            $query->whereDate('created_at', '>=', $courseFinishedDate['after']);
        }
    }
}
