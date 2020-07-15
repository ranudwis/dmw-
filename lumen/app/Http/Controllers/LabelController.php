<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LabelController extends Controller
{
    public function index()
    {
        $labels = DB::table('labels')
            ->get();

        return [
            'labels' => $labels
        ];
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        DB::table('labels')
            ->insert([
                'name' => $request->name,
                'slug' => $request->slug,
            ]);

        return [
            'created' => true
        ];
    }

    public function checkExistance($slug)
    {
        $exists = DB::table('labels')
            ->where('slug', $slug)
            ->exists();

        return [
            'exists' => $exists
        ];
    }

    public function update(Request $request, $labelId)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $updated = DB::table('labels')
            ->where('id', $labelId)
            ->update([
                'name' => $request->name,
                'slug' => $request->slug,
            ]);

        return [
            'updated' => (bool) $updated
        ];
    }

    public function delete($labelId)
    {
        $deleted = DB::table('labels')
            ->where('id', $labelId)
            ->delete();

        return [
            'deleted' => (bool) $deleted
        ];
    }
}
