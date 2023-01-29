<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DataBukuController extends Controller
{
    public function index()
    {

        $book = Book::latest();
        if (request('cari')) {
            $book->where('nama', 'like', '%' . request('cari') . '%')
                ->orWhere('alamat', 'like', '%' . request('cari') . '%')
                ->orWhere('tujuan', 'like', '%' . request('cari') . '%');
        }

        return view('admin.index', ['books' => $book->paginate(4)->withQueryString()]);
    }


    public function edit($id)
    {
        return view('admin.edit', ['buku' => Book::where('id', $id)->first()]);
    }

    public function update(Request $request, $id)
    {

        Book::where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tujuan' => $request->tujuan
        ]);
        return back()->with('flash', 'Edit');
    }

    public function destroy($id)
    {
        // Book::find($id)->delete();
        $data = Book::findOrFail($id);

        if (Storage::delete('/image/' . $data->foto)) {
            $data->delete();
        }
        return back()->with('flash', 'Hapus');
    }
}
