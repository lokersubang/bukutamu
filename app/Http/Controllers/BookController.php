<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    public function index()
    {
        return view('book.index');
    }


    public function store(Request $request)
    {
        //mendefinisikan folder
        // define('UPLOAD_DIR', '/public/image/');

        //menangkap variabel
        $img        = $request->mydata;
        $img        = str_replace('data:image/jpeg;base64,', '', $img);
        $img        = str_replace(' ', '+', $img);

        //resource gambar diubah dari encode
        $data       = base64_decode($img);

        //menamai file, file dinamai secara random dengan unik
        $file       = uniqid() . '.jpg';


        // Storage::put($file, $data);
        if (!Storage::put('/image/' . $file, $data)) {
            return back()->with('flash', 'Input Data Gagal !');
        }
        Book::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan,
            'foto' => $file
        ]);
        return back()->with('flash', 'Tambahkan !');
    }
}
