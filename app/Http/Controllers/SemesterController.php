<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = DB::table('semesters')->get();

        return [ 'semesters' => $semesters ];
    }

    public function show($slug)
    {
        $semester = DB::table('semesters')->where('slug', $slug)->first();
        $this->failIfNotExists($semester);
        $courses = DB::table('courses')->where('semester_id', $semester->id)->get();

        return (array) $semester + [
            'courses' => $courses
        ];
    }
}
