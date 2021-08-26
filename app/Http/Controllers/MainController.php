<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }

    public function members() {
        $members = new Book();
        $books = DB::table('books')
                    ->join('users', 'books.member_id', '=', 'users.id')
                    ->select('books.id', 'member_id', 'name', 'email', 'author', 'book') 
                    ->orderBy('name')
                    ->get();
        return view('members', ['books' => $books->all()]);
    }

    public function order() {
        return view('order');
    }

    public function order_check(Request $request) {
        $valid = $request->validate([
            'lstName' => 'required|alpha|min:4|max:50',
            'frstName' => 'required|alpha|min:4|max:50',
            'author' => 'required|min:4|max:50',
            'book' => 'required|min:4|max:50'
        ]);
        /*$library = new User();
        $library->lstName = $request->input('lstName');
        $library->frstName = $request->input('frstName');
        $library->save();*/
        $book = new Book();
        $book->author = $request->input('author');
        $book->book = $request->input('book');
        $cur_member_id = Auth::user()->id;
        //$cur_member_id = $library->id;
        $book->member_id = $cur_member_id;
        $book->save();
        return redirect()->route('home');
        //TODO: Добавить заглушку: книга успешно заказана с кнопкой "на главную" 
    }

    public function member_check(Request $id) {
        $id = key($id->all());
        DB::table('books')->where('id', '=', $id)->delete();
        //DB::table('members')->where('id', '=', $id)->delete();
        return redirect()->route('home');
    }
}
