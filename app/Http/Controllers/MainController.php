<?php

namespace App\Http\Controllers;

use App\Models\LibraryModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    public function home() {
        return view(view:'home');
    }

    public function members() {
        $members = new LibraryModel();
        $books = DB::table('books')
                    ->join('members', 'books.member_id', '=', 'members.id')
                    ->select('members.id', 'member_id', 'lstName', 'frstName', 'author', 'book') 
                    ->orderBy('lstName')
                    ->get();
        return view('members', ['books' => $books->all()]);
    }

    public function order() {
        return view(view:'order');
    }

    public function order_check(Request $request) {
        $valid = $request->validate([
            'lstName' => 'required|alpha|min:4|max:50',
            'frstName' => 'required|alpha|min:4|max:50',
            'author' => 'required|min:4|max:50',
            'book' => 'required|min:4|max:50'
        ]);
        $library = new LibraryModel();
        $library->lstName = $request->input(key: 'lstName');
        $library->frstName = $request->input(key: 'frstName');
        $library->save();
        $book = new OrderModel();
        $book->author = $request->input(key: 'author');
        $book->book = $request->input(key: 'book');
        $cur_member_id = $library->id;
        $book->member_id = $cur_member_id;
        $book->save();
        return redirect()->route(route: 'home');
        //TODO: Добавить заглушку: книга успешно заказана с кнопкой "на главную" 
    }

    public function member_check(Request $id) {
        $id = key($id->all());
        DB::table('books')->where('member_id', '=', $id)->delete();
        DB::table('members')->where('id', '=', $id)->delete();
        return redirect()->route(route: 'home');
    }
}
