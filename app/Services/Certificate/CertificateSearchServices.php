<?php

namespace App\Services\Certificate;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateSearchServices
{
    public function __construct(
        protected Request $request,
    )
    {
    }

    public function getCertificatesData()
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

    private function searchNamesAndCourses($query)
    {
        $search = $this->request->input('search');

        $query->where('student_name', 'like', "%$search%")
            ->orWhere('student_family', 'like', "%$search%")
            ->orWhereHas('course', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
    }

    private function courseFinishedDate($query)
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
