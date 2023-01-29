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


    public function store(BookRequest $request)
    {
        //mendefinisikan folder
        define('UPLOAD_DIR', '/public/image/');

        //menangkap variabel
        $img        = $request->foto;
        $img        = str_replace('data:image/jpeg;base64,', '', $img);
        $img        = str_replace(' ', '+', $img);

        //resource gambar diubah dari encode
        $data       = base64_decode($img);

        //menamai file, file dinamai secara random dengan unik
        $file       = uniqid() . '.jpg';
        // $image_path = $request->file('foto')->store('image', 'public');
        // dd($file);
        //memindahkan file ke folder upload

        // Storage::put($file, $data);
        if (!Storage::put('tes.jpg', $data)) {
            dd('gagal');
        }
        Book::create($request->all());
        return back()->with('flash', 'Tambahkan !');
    }
}
