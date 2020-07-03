<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')
            ->select(
                'courses.id',
                'courses.slug',
                'courses.title',
                'courses.code',
                'semesters.title as semester',
                'semesters.type as semester_type',
                'courses.credit',
                'courses.is_visible',
            )
            ->join('semesters', 'courses.semester_id', '=', 'semesters.id')
            ->get();

        return [ 'courses' => $courses ];
    }

    public function show($slug)
    {
        $course = DB::table('courses')
            ->where('slug', $slug)
            ->first();
        $this->failIfNotExists($course);

        return (array) $course;
    }

    public function indexExam($slug)
    {
        $exams = DB::table('exams')
            ->select(
                'exams.id',
                'exams.type',
                'exams.semester',
                'exams.start_year',
                'exams.end_year',
                'course_exam.information',
                'course_exam.question'
            )
            ->leftJoin('course_exam', 'exams.id', '=', 'course_exam.exam_id')
            ->leftJoin('courses', function ($query) {
                $query->on('course_exam.course_id', '=', 'courses.id')
                    ->orWhereNull('course_exam.course_id');
            })
            ->where('courses.slug', $slug)
            ->get();

        return [
            'exams' => $exams
        ];
    }
}
