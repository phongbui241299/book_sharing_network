<?php

namespace App\Http\Controllers;

use App\Book_type;
use App\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->get();
        $user_login = DB::table('user')->get();
        return view('pages.index', compact('books', 'user_login'));
    }


    public function books_detail($book_id)
    {
        $books = DB::table('books')->where("uploader", '=', "id")->get();
        $results = DB::table('books')
            ->join('book_type', 'book_type.type_id', 'books.type_id')
            ->select('book_type.*', 'books.*')
            ->where('books.books_id', $book_id)
            ->get();
        return view('pages.books_detail', compact('results'));
    }

    private function get_transaction_state_by_book($user, $books_id)
    {
        $user = Auth::user()->user_id;
        $result = DB::table('transaction')
            ->select('transaction.*')
            ->where('transaction.user_id', '=', "$user")
            ->where('transaction.books_id', '=', "$books_id")
            ->get();

        if ($result->isEmpty()) {
            return null;
        } else {
            $result = $result->first();
            return $result->state;
        }
    }

    private function get_transaction_state($transaction_id)
    {
        $user = Auth::user()->user_id;
        $result = DB::table('transaction')
            ->select('transaction.*')
            ->where('transaction_id', '=', "$transaction_id")
            ->get();

        if ($result->isEmpty()) {
            return null;
        } else {
            $result = $result->first();
            return $result->state;
        }
    }

    public function borrow_books($books_id)
    {
// ly thuyet
//        (1) kiem tra tinh trang muon sach
//        neu chua muon -> ok
//        neu da muon -> ok
//        neu dang muon thi => not ok
//         1, vao bang transaction query data...
//        (2)
//          neu (1) ok -> cho muon saach -> thong bao muon nthanh hcong
//         neu (1) not ok -> thong bao muon that bai
        $user = Auth::user()->user_id;
        $state = $this->get_transaction_state_by_book($user, $books_id);
        if ($state == null) {
            $this->createTransaction($user, $books_id);
            $rawMsg = 'Bạn đã mượn sách thành công';
            $msg = "<p><div class=\"alert alert-success\">$rawMsg</div></p>";
            return redirect()->back()->with("message_success", $msg);
        } else if ($state == 1) {
            $message = 'Mượn sách thất bại, bạn đang mượn cuốn sách này';
            $msg = "<p><div class=\"alert alert-danger\">$message</div></p>";
            return redirect()->back()->with("message_fail", $msg);

        } else if ($state == 0 || $state == 2) {
            $rawMsg = 'Bạn đã mượn sách thành công';
            $this->createTransaction($user, $books_id);
            $msg = "<p><div class=\"alert alert-success\">$rawMsg</div></p>";
            return redirect()->back()->with("message_success", $msg);
            // 0 la trang thai chua muon --- 2 la trang thai da muon
        }
    }

// ham con cua muon sach
    private function createTransaction($user, $books)
    {
        $borrowDate = date("Y-m-d");
        $query = DB::table('transaction')
            ->insert([
                'user_id' => $user,
                'books_id' => $books,
                'state' => 1, // 1 la trang thai dang muon
                'date_borrow' => "$borrowDate"
            ]);
    }

    private function update_transaction_state_by_book($user, $books_id)
    {
        $returnDate = date("Y-m-d");
        $query = DB::table('transaction')
            ->where('user_id', '=', $user)
            ->where('books_id', '=', $books_id)
            ->update([
                'date_return' => "'$returnDate'",
                'state' => 2
            ]);
    }

    private function update_transaction_state($transaction_id)
    {
        $returnDate = date("Y-m-d");
        $query = DB::table('transaction')
            ->where('transaction_id', '=', $transaction_id)
            ->update([
                'date_return' => "$returnDate",
                'state' => 2
            ]);
    }

// profile_id la ID cua trang ca nhan bat ky
    public function return_books(Request $request, $profile_id)
    {
        $user = Auth::user()->user_id;
        $transaction_id = $request->input('transaction_id');
        if ($user != $profile_id) {
            $rawMsg = "Bạn không có quyền trả sách của người khác";
            $msg = "<p><div class=\"alert alert-danger\">$rawMsg</div></p>";
            return redirect()->back()->with("message", $msg);
        } else {
            $state = $this->get_transaction_state($transaction_id);
            if ($state == 1) {
                $this->update_transaction_state($transaction_id);
                $message = 'Bạn đã trả sách thành công';
                $msg = "<p><div class=\"alert alert-success\">$message</div></p>";
                return redirect()->back()->with("message_return", $msg);

            } else {

                $rawMsg = "Trả sách thất bại!";
                $msg = "<p><div class=\"alert alert-danger\">$rawMsg</div></p>";
                return redirect()->back()->with("message_fail", $msg);
            }
        }
    }


//them sach
    public function add__books()
    {
        $book_type = DB::table('book_type')->get();
//        if (Auth::check() && Auth::user()->role == 0) {
            return view('pages.add__books', compact('book_type'));
//        } else {
//            $rawMsg = 'Vui lòng đăng nhập để thêm sách!';
//            $msg = "<p><div class=\"alert alert-warning\">$rawMsg</p></div>";
//            return redirect('account/login')->with("mess", $msg);        }
    }


    public function post_add_books(Request $request)
    {
        $books = new books();
        $files = $request->book_image;
        $file_name = time() . "_" . md5(rand(0, 99999)) . $files->getClientOriginalName();
        $books->image = "uploads/books/" . $file_name;
        $files->move('uploads/books', $file_name);
        $books->book_name = strtoupper($request->bookname);
        $books->type_id = intval($request->get('type_id'));
        $books->author = strtoupper($request->get('author'));
        $books->publisher = ucwords($request->get('publisher'));
        $books->uploader = Auth::user()->user_id;
        $books->amount = $request->get('amount');
        $books->status = $request->get('status');
//        echo json_encode($books);
        $books->save();
        $rawMsg = 'Bạn đã đăng sách thành công';
        $msg = "<p><div class=\"alert alert-success\">$rawMsg</div></p>";
        return redirect()->back()->with("message",$msg);
    }


    public function delete($books_id)
    {
        $books_id = books::find($books_id);
        $books_id->delete();
        return redirect()->back();

    }

    private function normallizeString($string)
    {
        $string = trim($string);
        $string = strtolower($string);
        strip_tags($string);
        return $string;
    }

//ham loc sach theo loai (nam tren menu)
    public function getBookByCategory($name)
    {
        $name = $this->normallizeString($name);
        $type_book = DB::table("books")->join("book_type", "books.type_id", "=", "book_type.type_id")
            ->where('book_type.slug', "=", $name)->get();
//        $filter_type_book = DB::table("books")->join("book_type", "books.type_id", "=", "book_type.type_id")
//            ->where('book_type.slug', "=", $name)->paginate(2);
        $filter_type_book = DB::table("books")->join("book_type", "books.type_id", "=", "book_type.type_id")
            ->where('book_type.slug', "=", $name)->get();
        $collection = collect($type_book);
        $unique_collection = $collection->unique('type_name');
        $unique_collection->values()->all();
//          echo json_encode($type_book);
        return view('pages.book_category', compact('filter_type_book', 'unique_collection'));
    }

    public function findBookByName(Request $request)
    {
        $name = $request->query("search");
        $name = $this->normallizeString($name);
        $books = DB::table("books")->where("book_name", "LIKE", '%', $name)->get();
//        echo json_encode($books);
        return view('pages.book__find', compact('books'));
    }

    public function profile($id)
    {
        strip_tags($id);
        $id = intval($id);
        $user = DB::table("user")->where("user_id", "=", "$id")->get();
//        echo json_encode($user);
        $user = $user->first();
        //query truy van giao dich
        $transactions = DB::table('transaction')
            ->join('books', 'transaction.books_id', '=', 'books.books_id')
            ->select('books.*', 'transaction.*')
            ->where('transaction.user_id', '=', "$user->user_id")
            ->get();
        //hien thi sach dang so huu
        $books = DB::table('books')
            ->join('user', 'books.uploader', '=', 'user.user_id')
            ->select('books.*', 'user.*')
            ->where('books.uploader', '=', "$user->user_id")
            ->get();
        return view('pages.profile', compact(['user', 'transactions', 'books']));
    }

    public function book__manager()
    {
        return view('admin.book__manager');
    }
    public function account__manager()
    {
        return view('admin.account__manager');
    }

    public function search(Request $request)
    {
        $search_vl = $request->search_vl;
        $search = DB::table('books')->where('book_name', 'like', '%' . $search_vl . '%')->get();
        return response()->json($search);
    }
}
