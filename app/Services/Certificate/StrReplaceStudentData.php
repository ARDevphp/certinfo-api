<?php

namespace App\Services\Certificate;

class StrReplaceStudentData
{
    public function replaceStudentData(string $svg, string $name, string $family, string $course_name): string
    {
        return str_replace(
            ['{{ date }}', '{{ name }}', '{{ surname }}', '{{ course_name }}'],
            [now()->format('Y'), $name, $family, $course_name],
            $svg
        );
    }
}
