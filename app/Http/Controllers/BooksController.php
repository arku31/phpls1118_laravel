<?php

namespace App\Http\Controllers;

use App\Events\BookCreatedEvent;
use App\Mail\BooksCreatedMail;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $data['books'] = Book::with('user')->get();
        event(new BookCreatedEvent());
        return view('admin.books.index', $data);
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'user_id' => 'required|numeric'
        ]);

        $name = $request->get('name');
        $user_id = $request->user_id;

        $book = Book::create(['name' => $name, 'user_id' => $user_id]);

        $user = \Auth::user();
        \Mail::to($user)->send(new BooksCreatedMail($book));
        return redirect(route('books.index'));
    }

    public function update(Book $book, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'user_id' => 'required|numeric'
        ]);

        $name = $request->get('name');
        $user_id = $request->user_id;

        $book->update(['name' => $name, 'user_id' => $user_id]);
        return redirect(route('books.index'));
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'book' => $book,
            'users' => User::all()
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect(route('books.index'));
    }

    public function storeJson(Request $request)
    {
        $book = new Book();
        $book->name = $request->get('name');
        $book->user_id = $request->get('user_id');
        $book->save();
        return $book;
    }
}
