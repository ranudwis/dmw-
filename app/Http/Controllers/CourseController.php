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
}
