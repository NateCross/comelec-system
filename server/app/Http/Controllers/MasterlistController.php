<?php

namespace App\Http\Controllers;

use App\Helpers\Masterlist;
use App\Models\Student;
use Illuminate\Http\Request;

class MasterlistController extends Controller
{
    public function index() {
        return view('frontend.master-list.index', [
            'students' => Student::paginate(10),
        ]);
    }

    public function upload(Request $request) {
        if ($request->validate([
            'overwrite' => ['nullable', 'boolean'],
        ]))
            $overwrite = true;
        else
            $overwrite = false;

        if ($request->hasFile('sheet'))
            Masterlist::uploadMasterlist(
                $request->file('sheet', $overwrite)
            );
    }

    public function testMasterlist(Student $student) {
        $student = Masterlist::replaceStudentDataFromMasterlist(
            $student,
        );
        $student->save();
    }

}