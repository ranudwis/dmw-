<?php

namespace App\Dmw\Repository;

use DB;
use App\Exam;

class CourseExamRepository
{
    public function getExamByCourseSlug($slug)
    {
        return DB::table('exams')
            ->select(
                'exams.id',
                'exams.type',
                'exams.semester',
                'exams.start_year',
                'exams.end_year',
                'course_exam.information',
            )
            ->leftJoin('course_exam', 'exams.id', '=', 'course_exam.exam_id')
            ->leftJoin('courses', function ($query) {
                $query->on('course_exam.course_id', '=', 'courses.id')
                    ->orWhereNull('course_exam.course_id');
            })
            ->where('courses.slug', $slug)
            ->get();
    }

    public function getExam($courseSlug, $examId)
    {
        return (array) DB::table('exams')
            ->select(
                'exams.type',
                'exams.semester',
                'exams.start_year',
                'exams.end_year',
                'course_exam.information',
                'course_exam.drive_collective_exam_file_id',
                'course_exam.drive_question_file_id',
            )
            ->leftJoin('course_exam', 'exams.id', '=', 'course_exam.exam_id')
            ->leftJoin('courses', 'course_exam.course_id', '=', 'courses.id')
            ->where('exams.id', $examId)
            ->where(function ($query) use ($courseSlug) {
                $query->where('courses.slug', $courseSlug)
                    ->orWhere('courses.slug', null);
            })
            ->first();
    }

    public function getExamAnswer($examId)
    {
        return DB::table('answers')
            ->select('answers.*')
            ->join('course_exam', 'answers.course_exam_id', '=', 'course_exam.id')
            ->join('exams', 'course_exam.exam_id', '=', 'exams.id')
            ->where('exams.id', $examId)
            ->get();
    }
}
