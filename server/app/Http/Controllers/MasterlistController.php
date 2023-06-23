<?php

namespace App\Http\Controllers;

use App\Helpers\Masterlist;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

use function PHPUnit\Framework\isEmpty;

class MasterlistController extends Controller
{
    public function index() {
        return view('frontend.master-list.index', [
            'students' => Student::query()
                ->whereKeyNot('0000')
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create() {
        return view('frontend.master-list.create');
    }

    public function edit(Student $student) {
        try {
            return view(
                'frontend.master-list.edit',
                [
                    'student' => $student,
                ]
            );
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function upload(Request $request) {
        try {
            if (!$request->hasFile('sheet')) 
                return;
            
            $path = $request->file('sheet')->getPathname();

            $rows = SimpleExcelReader::create($path, 'csv')
                ->getRows();

            $values = $rows->map(fn ($item, $key) => ([
                'student_id' => $item['student_id'],
                'full_name' => $item['full_name'],
                'college' => $item['college'],
                'is_enrolled' => true,
            ]))->toArray();

            Student::upsert(
                $values, 
                ['student_id'],
                ['full_name', 'college', 'is_enrolled'],
            );
            return response()->json([
                'message' => 'Success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function testMasterlist(Student $student) {
        $student = Masterlist::replaceStudentDataFromMasterlist(
            $student,
        );
        $student->save();
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'query' => [
                'string',
                'nullable',
            ],
            'filter' => [
                'boolean',
                'nullable',
            ],
        ]);
        $query = $validated['query'] ?? null;
        $filter = $validated['filter'] ?? null;

        $students = Student::query();

        if (isset($query)) {
            $students->where('full_name', 'LIKE', "%$query%");
        } 
        if (isset($filter)) {
            $filter = (boolean) $filter;
            $students->where('is_enrolled', '=', $filter);
        }

        $result = $students
            ->whereKeyNot('0000')
            ->latest()
            ->paginate(10)
            ->appends([
                'query' => $query,
                'filter' => $filter,
            ]);

        return view(
            'frontend.master-list.index',
            [
                'students' => $result,
            ],
        );
    }

    public function exportCsv() {
        $students = Student::query()
            ->whereKeyNot('0000')
            ->get()
            ->toArray();
        
        $writer = SimpleExcelWriter::create(
            'master-list-export.csv',
        )->addRows($students);

        return response()->download(
            public_path() . '/master-list-export.csv',
        );
    }
}