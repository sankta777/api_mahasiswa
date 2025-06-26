<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20|unique:students',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $student = Student::create($request->all());
        return response()->json([
            'message' => 'Mahasiswa berhasil ditambahkan',
            'data' => $student
        ], 201);
    }

    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20|unique:students,nim,'.$student->id,
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $student->update($request->all());
        return response()->json([
            'message' => 'Mahasiswa berhasil diupdate',
            'data' => $student
        ]);
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Mahasiswa berhasil dihapus'], 200);
    }
}