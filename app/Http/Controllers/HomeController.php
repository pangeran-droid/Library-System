<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facedes\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('home.index',compact('data'));
    }
    public function book_details($id)
    {
        $data = Book::all();
        return view('home.book_details',compact('data'));
    }
    public function borrow_book()
    {
        $data = Book::find($id);

        $book_id = $id;

        $quantity = $data->quantity;

         if($quantity >='1')
         {
            if(Auth::id())
            {
                $user = Auth::user()->id;

                $borrow = new Borrow;

                $borrow->book_id = $book_id;

                $borrow->user_id = $user_id;

                $borrow->status = 'Applied';

                $borrow->save();

                return redirect()->back()->with('message','A request is send to admin to borrow this book');
            }

            else
            {
                return redirect('/login');
            }
         }

         else
         {
            return redirect()->back()->with('message','Not enough book Available');
         }
    }
}
