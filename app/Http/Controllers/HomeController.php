<?php

namespace App\Http\Controllers;

use App\Book_type;
use App\Books;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
            ->join('user','books.uploader','=','user.user_id')
            ->select('user.*','books.*')
            ->get();

        return view('pages.index', compact('books'));
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
            return view('pages.add__books', compact('book_type'));
    }

    public function add_type_books(){
        return view('admin.post_type_books');
    }
    public function post_type_books(Request $request){
        $book_type = new book_type();
        $book_type->type_name = strtoupper($request->type_name);
        $book_type->slug = ($request->slug);
        $book_type->save();
        $rawMsg = 'Bạn đã thêm loại sách thành công';
        $msg = "$rawMsg";
        return redirect()->back()->with("mess_type_book",$msg);
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
        $msg = "$rawMsg";
        return redirect()->back()->with("message",$msg);
    }


    public function delete_books($id)
    {
        $id_del = DB::table('books')->where('books_id',$id)->delete();
        $rawMsg = 'Bạn đã xóa sách thành công';
        $msg = "$rawMsg";
        return redirect('/')->with("delete_mes", $msg);
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
        $books = DB::table('books')
            ->join('user','books.uploader','=','user.user_id')
            ->select('user.*','books.*')
            ->get();
        $type_book = DB::table("books")->join("book_type", "books.type_id", "=", "book_type.type_id")
            ->where('book_type.slug', "=", $name)
            ->get();
        $filter_type_book = DB::table("books")
            ->join("book_type", "books.type_id", "=", "book_type.type_id")
            ->join('user','books.uploader','=','user.user_id')
            ->where('book_type.slug', "=", $name)
            ->select('books.*','book_type.*','user.*')
            ->get();
        $collection = collect($type_book);
        $unique_collection = $collection->unique('type_name');
        $unique_collection->values()->all();
//          echo json_encode($type_book);
        return view('pages.book_category', compact('filter_type_book', 'unique_collection','books'));
    }
    public function findBookByName(Request $request)
    {
        $name = $request->search;
//        $name = $this->normallizeString($name);
        $books = DB::table("books")->where("book_name", "LIKE", '%' .$name. '%')->get();
        return view('pages.book__find', compact('books'));
    }

    public function profile($id)
    {
        strip_tags($id);
        $id = intval($id);
        $user = $id;
        //query truy van giao dich
        $ownerUser = DB::table("user")
            ->where('user_id',$id)
            ->get();
        $transactions = DB::table('transaction')
            ->join('books', 'transaction.books_id', '=', 'books.books_id')
            ->join('user','transaction.user_id','=','user.user_id')
            ->select('books.*', 'transaction.*','user.*')
            ->where('transaction.user_id', '=', $user)
            ->get();
        $address = DB::table("user")
            ->join('devvn_tinhthanhpho','user.city','=','devvn_tinhthanhpho.matp')
            ->join('devvn_quanhuyen','user.district','=','devvn_quanhuyen.maqh')
            ->join('ward','user.ward','=','ward.id')
            ->select('user.*','ward.*','devvn_tinhthanhpho.*','devvn_quanhuyen.*' )
            ->where('user.user_id',$id)
            ->get();
//        dd($address);
        //hien thi sach dang so huu
        $books = DB::table('books')
            ->join('user', 'books.uploader', '=', 'user.user_id')
            ->select('books.*', 'user.*')
            ->where('books.uploader', '=', $id)
            ->get();
        return view('pages.profile', compact(['user','transactions','address','ownerUser','books']));
    }
    public function get_edit__profile($id){
        $city = DB::table('devvn_tinhthanhpho')->get();
        $user = DB::table("user")->where("user_id", "=", $id)->get();
        $address = DB::table("user")
            ->join('devvn_tinhthanhpho','user.city','=','devvn_tinhthanhpho.matp')
            ->join('devvn_quanhuyen','user.district','=','devvn_quanhuyen.maqh')
            ->join('ward','user.ward','=','ward.id')
            ->select('user.*','ward.*','devvn_tinhthanhpho.*','devvn_quanhuyen.*' )
            ->where('user.user_id',$id)
            ->get();
        return view('pages.edit__profile', compact('user','address','city'));
    }
    public function post_edit__profile(Request $request,$id)
    {
        $files = $request->avatar;
        $file_name = time() . "_" . md5(rand(0, 99999)) . $files->getClientOriginalName();
        $files->move('uploads/avatar', $file_name);
        $user = DB::table('user')->where('user_id', $id)
            ->update([
                'user_name' =>  ucwords($request->name),
                'phone' => $request->phone,
                'city' => $request->city,
                'district' => $request->district,
                'ward' => $request->ward,
                'avatar' =>  "uploads/avatar/".$file_name,
            ]);
        $rawMsg = 'Bạn đã cập nhật thành công!';
        $mess_update = "$rawMsg";
        return redirect()->back()->with('mess_update',$mess_update);
    }
    public function get_change_pass($id)
    {
        $user = DB::table("user")->where("user_id", "=", $id)->get();
        return view('pages.edit_password', compact('user'));
    }

    public function post_change_pass(Request $request,$id){
        $user = DB::table('user')->where('user_id', $id)
            ->update([
                'password' => bcrypt($request->password),
            ]);
        $rawMsg = 'Bạn đã cập nhật mật khẩu thành công!';
        $mess_update = "$rawMsg";
        return redirect()->back()->with('mess_update_pass',$mess_update);
    }

    public function get_edit__books($id){
        $book_type = DB::table('book_type')->get();
        $book = DB::table('books')
            ->where('books.books_id',$id)
            ->get();
        $user = DB::table("user")->get();
        return view('pages.edit__books', compact('book','user','book_type'));
    }

    public function post_edit_books(Request $request,$id){
        $files = $request->book_image;
        $file_name = time() . "_" . md5(rand(0, 99999)) . $files->getClientOriginalName();
        $files->move('uploads/books', $file_name);
        $book = DB::table('books')->where('books_id', $id)
            ->update([
                'book_name' =>  ucwords($request->book_name),
                'author' => $request->author,
                'type_id' => $request->type_id,
                'publisher' => $request->publisher,
                'page_number' => $request->page_number,
                'status'=>$request->status,
                'image' => "uploads/books/" . $file_name,
            ]);
        $rawMsg = 'Bạn đã cập nhật thành công!';
        $mess_update = "$rawMsg";
        return redirect()->back()->with('mess_update',$mess_update);
    }


    public function search_ajax(Request $request){
        $value = $request->get('data');
        $search_data = DB::table('books')->where('book_name', 'like', '%' .$value. '%')->get();
//        dd($search);
        return response()->json($search_data);
    }

    public function search(Request $request)
    {
        $search_vl = $request->get('search');
        $search = DB::table('books')->where('book_name', 'like', '%' .$search_vl. '%')->get();
//        dd($search);
        return view('pages.search',compact('search'));
    }
    public function getCity(Request $request){
        $city_id = $request->city;
        $city_lv1 = DB::table('devvn_quanhuyen')->where('matp',$city_id)->get();
        return response()->json($city_lv1);
    }
    public function getDistrict(Request $request){
        $district_id = $request->district;
        $district_lv1 = DB::table('ward')->where('district_id',$district_id)->get();
        return response()->json($district_lv1);
    }
    public function contact(){
        return view('pages.contact');
    }

    public function user__list(){
        $user = DB::table("user")
            ->join('devvn_tinhthanhpho','user.city','=','devvn_tinhthanhpho.matp')
            ->join('devvn_quanhuyen','user.district','=','devvn_quanhuyen.maqh')
            ->join('ward','user.ward','=','ward.id')
            ->select('user.*','ward.*','devvn_tinhthanhpho.*','devvn_quanhuyen.*','user.user_id' )
            ->get();
        return view('pages.user__list', compact('user'));
    }
}

