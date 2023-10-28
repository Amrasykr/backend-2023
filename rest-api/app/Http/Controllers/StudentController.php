<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        //Menampilkan data student
        $student = Student::all();
        
        $data = [
            'messages' => 'Get All Students',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        //Menambahkan data student
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'messages' => 'Berhasil menambahkan data student',
            'data' => $student
        ];
        
        return response()->json($data, 201);

    }


    public function update(Request $request,  $id)
    {
        //Mengupdate data student
      $student = Student::find($id);

        if ($student) {
            $student->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jurusan' => $request->jurusan
            ]);

            $data = [
                'message' => 'Berhasil mengupdate data student',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data student tidak ditemukan',
            ];

            return response()->json($data, 400);
        }
    }

    public function destroy($id)
    {

      $student = Student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Berhasil menghapus data student',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data student tidak ditemukan',
            ];

            return response()->json($data, 400);
        }
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Berhasil menampilkan data student dengan ID ' . $id,
                'data' => $student
            ];
        } else {
            $data = [
                'message' => 'Siswa dengan ID ' . $id . ' tidak ditemukan',
                'data' => null
            ];
        }

        return response()->json($data);
    }
}