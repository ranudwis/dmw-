<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dmw\Repository\CourseExamRepository;
use DB;

class CourseExamController extends Controller
{
    private $courseExam;

    public function __construct(CourseExamRepository $courseExam)
    {
        $this->courseExam = $courseExam;
    }

    public function index($slug)
    {
        return [
            'exams' => $this->courseExam->getExamByCourseSlug($slug)
        ];
    }

    public function show($slug, $examId)
    {
        $exam = $this->courseExam->getExam($slug, $examId);

        $exam['answers'] = $this->courseExam->getExamAnswer($examId);

        return $exam;
    }
}
