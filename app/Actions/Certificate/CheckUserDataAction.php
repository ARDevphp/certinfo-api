<?php

namespace App\Actions\Certificate;

use App\Models\Certificate;

class CheckUserDataAction
{
    public function check(Certificate $certificate, $data)
    {
        return $certificate->student_name !== $data['student_name'] ||
               $certificate->student_family !== $data['student_family'] ||
               $certificate->course_id !== $data['course_id'];
    }

}
