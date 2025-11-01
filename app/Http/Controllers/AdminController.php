<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())

        {
            $user_type = Auth()->user()->usertype;

            if($user_type == 'admin')

                {
                    $user = User::all()->count();
                    $book = Book::all()->count();
                    $borrow = Borrow::where('status', 'Approved')->count();
                    $returned = Borrow::where('status', 'Returned')->count();

                    $title = 'Admin Dashboard';

                    return view('admin.index', compact('user', 'book', 'borrow', 'returned', 'title'));
                }

            else if($user_type == 'user')

                {
                    $data = Book::all();

                    $category = Category::all();

                    $title = 'Home';

                    return view('home.index', compact('data', 'category', 'title'));
                }

            else

                {
                    return redirect()->back();
                }
        }
    }

    public function category_page()
    {
        $data = Category::all();

        $title = 'All Category';

        return view('admin.category', compact('data', 'title'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->cat_title = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function cat_delete($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        $title = 'Edit Category';

        return view('admin.edit_category', compact('data', 'title'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->cat_title = $request->cat_name;

        $data->save();

        return redirect('/category_page')->with('message', 'Category Update Successfully');
    }

    public function add_book()
    {
        $data = Category::all();

        $title = 'Add Books';

        return view('admin.add_book', compact('data', 'title'));
    }

    public function store_book(Request $request)
    {
        $data = new Book;

        $data->title = $request->title;
        $data->auther_name = $request->auther_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $data->book_code = 'BK-' . strtoupper(uniqid());
        $book_image = $request->book_img;
        $auther_image = $request->auther_img;

        if($book_image) {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

            $request->book_img->move('book', $book_image_name);

            $data->book_img = $book_image_name;
        }

        if($auther_image) {
            $auther_image_name = time().'.'.$auther_image->getClientOriginalExtension();

            $request->auther_img->move('auther', $auther_image_name);

            $data->auther_img = $auther_image_name;
        }

        $data->save();

        return redirect()->back()->with('message', 'Book Added Successfully');
    }

    public function show_book()
    {
        $book = Book::all();

        $writer = new PngWriter();

        foreach ($book as $b) {
            $bookUrl = url('book_details/' . $b->id);

            $qr = QrCode::create($bookUrl)->setSize(120)->setMargin(5);
            $result = $writer->write($qr);
            $b->qr_base64 = base64_encode($result->getString());
        }

        $title = 'All Books';

        return view('admin.show_book', compact('book', 'title'));
    }

    public function book_delete($id)
    {
        $data = Book::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Book Deleted Successfully');
    }

    public function edit_book($id)
    {
        $data = Book::find($id);
        
        $category = Category::all();

        $title = 'Edit Books';

        return view('admin.edit_book', compact('data', 'category', 'title'));
    }

    public function update_book(Request $request, $id)
    {
        $data = Book::find($id);

        $data->title = $request->title;
        $data->auther_name = $request->auther_name;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->description = $request->description;
        $data->category_id = $request->category;
        $book_image = $request->book_img;
        $auther_image = $request->auther_img;

        if($book_image) {
            $book_image_name = time().'.'.$book_image->getClientOriginalExtension();

            $request->book_img->move('book', $book_image_name);

            $data->book_img = $book_image_name;
        }

        if($auther_image) {
            $auther_image_name = time().'.'.$auther_image->getClientOriginalExtension();

            $request->auther_img->move('auther', $auther_image_name);

            $data->auther_img = $auther_image_name;
        }

        $data->save();

        return redirect('/show_book')->with('message', 'Book Updates Successfully');
    }

    public function borrow_request()
    {
        $data = Borrow::all();

        $title = 'All Borrow Req';

        return view('admin.borrow_request', compact('data', 'title'));
    }

    public function approved_book($id)
    {
        $data = Borrow::find($id);

        $status = $data->status;

        if ($status == 'Approved')
        {
            return redirect()->back();
        }
        else
        {
            $data->status = 'Approved';
    
            $data->save();
    
            $bookid = $data->book_id;
    
            $book = Book::find($bookid);
    
            $book_qty = $book->quantity - 1;
    
            $book->quantity = $book_qty;
    
            $book->save();
    
            return redirect()->back();
        }
    }

    public function returned_book($id)
    {
        $data = Borrow::find($id);

        $status = $data->status;

        if ($status == 'Returned')
        {
            return redirect()->back();
        }
        else
        {
            $data->status = 'Returned';
    
            $data->save();
    
            $bookid = $data->book_id;
    
            $book = Book::find($bookid);
    
            $book_qty = $book->quantity + 1;
    
            $book->quantity = $book_qty;
    
            $book->save();
    
            return redirect()->back();
        }
    }

    public function rejected_book($id)
    {
        $data = Borrow::find($id);

        $data->status = 'Rejected';

        $data->save();

        return redirect()->back();
    }

    public function add_user()
    {
        $title = 'Add User';

        return view('admin.add_user', compact('title'));
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|string'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->back()->with('message', 'User Added Successfully');
    }

    public function show_user(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $data = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->get();
        } else {
            $data = User::all();
        }

        $title = 'All Users';

        return view('admin.show_user', compact('data', 'title'));
    }

    public function delete_user($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'User Deleted Successfully');
    }

    public function edit_user($id)
    {
        $data = User::find($id);

        $title = 'Edit Users';

        return view('admin.edit_user', compact('data', 'title'));
    }

    public function update_user(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|string'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = $request->usertype;
        $user->save();

        return redirect('/show_user')->with('message', 'User Updated Successfully');
    }

    public function downloadQr($id)
    {
        $book = Book::findOrFail($id);
        $bookUrl = url('book_details/' . $book->id);
        $qr = QrCode::create($bookUrl)->setSize(200);
        $writer = new PngWriter();
        $result = $writer->write($qr);

        return new Response(
            $result->getString(),
            200,
            [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="QR-'.$book->book_code.'.png"',
            ]
        );
    }

    public function generateAllQrPdf()
    {
        $books = Book::all();
        $writer = new PngWriter();
        $qrData = [];

        foreach ($books as $book) {
            $bookUrl = url('book_details/' . $book->id);
            $qr = QrCode::create($bookUrl)->setSize(150)->setMargin(5);
            $result = $writer->write($qr);
            $qrBase64 = base64_encode($result->getString());

            $qrData[] = [
                'title' => $book->title,
                'code' => $book->book_code,
                'qr_base64' => $qrBase64
            ];
        }

        $pdf = Pdf::loadView('admin.all_qr_pdf', compact('qrData'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('All_Book_QR.pdf');
    }
}
