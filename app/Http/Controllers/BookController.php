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

        Book::create($request->all());
        return back()->with('flash', 'Tambahkan !');
    }
}
