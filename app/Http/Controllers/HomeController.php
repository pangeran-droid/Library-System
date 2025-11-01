<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;

class HomeController extends Controller
{
    public function index()
    {
        $data = Book::all();
        
        $category = Category::all();

        $title = 'Home';

        return view('home.index', compact('data', 'category', 'title'));
    }

    public function borrow_books($id)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('message', 'You must login to borrow a book.');
        }

        $data = Book::find($id);

        if (!$data) {
            return redirect()->back()->with('message', 'Book not found.');
        }

        if ($data->quantity <= 0) {
            return redirect()->back()->with('message', 'Book is already out of stock.');
        }

        $user_id = Auth::user()->id;

        $existing = Borrow::where('book_id', $id)
                  ->where('user_id', $user_id)
                  ->whereIn('status', ['Applied', 'Approved'])
                  ->first();

        if ($existing) {
            return redirect()->back()->with('message', 'You already have a pending or approved request for this book.');
        }

        $borrow = new Borrow;
        $borrow->book_id = $id;
        $borrow->user_id = $user_id;
        $borrow->status = 'Applied';
        $borrow->save();

        return redirect()->back()->with('message', 'A request is sent to admin to borrow this book.');
    }

    public function book_history()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $data = Borrow::where('user_id', '=', $user_id)->get();

            $title = 'My History';
            
            return view('home.book_history', compact('data', 'title'));
        } else {
            return redirect()->route('login')->with('message', 'Please login first.');
        }
    }

    public function cancel_req($id)
    {
        $data = Borrow::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book Borrow request canceled successfully');
    }

    public function explore()
    {
        $category = Category::all();

        $data = Book::all();

        $title = 'Explore Books';

        return view('home.explore', compact('data', 'category', 'title'));
    }

    public function search(Request $request)
    {
        $category = Category::all();

        $search = $request->search;

        $data = Book::where('title', 'LIKE', '%'. $search. '%')->orWhere('auther_name', 'LIKE', '%'. $search. '%')->get();

        $title = 'Search';

        return view('home.explore', compact('data', 'category', 'title'));
    }

    public function cat_search($id)
    {
        $category = Category::all();

        $data = Book::where('category_id', $id)->get();

        $title = 'Category Search';

        return view('home.explore', compact('data', 'category', 'title'));
    }

    public function book_details($id)
    {
        $data = Book::find($id);

        if (!$data) {
            return redirect()->back()->with('message', 'Book not found.');
        }

        $bookUrl = url('book_details/' . $data->id);

        $qr = QrCode::create($bookUrl)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setSize(200)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin);

        $writer = new PngWriter();
        $result = $writer->write($qr);
        $data->qr_base64 = base64_encode($result->getString());

        $title = 'Books Details';

        return view('home.book_details', compact('data', 'title'));
    }
}
