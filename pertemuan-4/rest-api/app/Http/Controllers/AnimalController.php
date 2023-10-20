<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
public $animals = ['kucing','ayam','ikan'];

    public function index()
    {
        //Meloop array animal agar terpecah dari aray
        echo "Menampilkan data animals\n";
        foreach($this->animals as $animal){
        echo $animal . "\n";
        }
    }

  public function store(Request $request)
    {
        //mendapatkan data hewan yang di input dari dengan key animal
        $newAnimal = $request->input('animal');
        //menambahkan variable yang sudah di tampung inputan postman kedalam variable animals
        array_push($this->animals, $newAnimal);

        //mengembalikan respons dan menampilkan data animal dengan array (direkomendasikan untuk JSON)
        return response()->json(['message' => "Berhasil menambahkan $newAnimal kedalam data animals", 'animals' => $this->animals]);
    }


    public function update(Request $request, $id)
    {
        // Mendapatkan data hewan yang ingin diubah dengan key animal
        $updatedAnimal = $request->input('animal');

        // Memeriksa apakah ID yang diberikan sesuai dengan indeks yang valid dalam array
        if (isset($this->animals[$id])) {
            // Mengubah data hewan berdasarkan ID
            $this->animals[$id] = $updatedAnimal;
            // Mengembalikan respons berhasil dan menampilkan data animals dengan array (direkomendasikan untuk JSON)
            return response()->json(['message' => "Berhasil mengubah data animal dengan ID $id menjadi $updatedAnimal", 'animals' => $this->animals]);
        } else {
            // Mengembalikan respons pesan error jika ID tidak valid
             return response()->json(['message' => 'Tidak dapat mengubah data animal/ID tidak valid'], 400);
        }
    }


        public function destroy($id)
        {
            // Memeriksa apakah ID yang diberikan sesuai dengan indeks yang valid dalam array
            if (isset($this->animals[$id])) {
                // Menghapus elemen dengan array_splice
                array_splice($this->animals, $id, 1);
                return response()->json(['message' => "Data animal dengan ID $id berhasil dihapus", 'animals' => $this->animals]);
            } else {
                return response()->json(['message' => 'Tidak dapat menghapus data animal/ID tidak valid'], 400);
            }
        }
}
