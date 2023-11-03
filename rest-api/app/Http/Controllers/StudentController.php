<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {  
        // Menampilkan data dan memberikan validasi jika data tidak ada. 3 november 2023
        $students = Student::all();

		if ($students) {
			$response= [
				'message' => 'Menampilkan Data Semua Student',
				'data' => $students,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Data tidak ada'
			];
			return response()->json($response, 200);
		}
    }

    public function store(Request $request)
    {
        // Validasi pada data yang di butuhkan saat input

        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required | email',
            'jurusan' => 'required',
        ]);

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
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
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
    
    // Menghapus data student
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
    
    // Menampilkan data student dengan id
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