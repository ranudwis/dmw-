<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExamController extends Controller
{
    public function index()
    {
        $exams = DB::table('exams')->get();

        return [ 'exams' => $exams ];
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|in:mid,end',
            'semester' => 'required|in:even,odd',
            'schoolYear' => 'required',
        ]);

        $created = DB::table('exams')->insert([
            'type' => $request->type,
            'semester' => $request->semester,
            'start_year' => $request->schoolYear[0],
            'end_year' => $request->schoolYear[1],
        ]);

        return [ 'created' => (bool) $created ];
    }
}
