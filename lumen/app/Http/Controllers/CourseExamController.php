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

    public function update(Request $request, CourseExamRepository $courseExam, $slug, $examId)
    {
        $this->validate($request, [
            'information' => 'nullable'
        ]);

        $updateData = [];

        if ($request->has('information')) {
            $updateData['information'] = $request->information;
        }

        $exam = $courseExam->getExam($slug, $examId);
        $updated = $courseExam->update($examId, $updateData);

        return [ 'updated' => (bool) $updated ];
    }
}
