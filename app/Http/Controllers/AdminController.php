<?php

namespace App\Http\Controllers;
use App\Book_type;
use App\Books;
use App\Comments;
use App\User;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function book__manager()
    {
        $books = DB::table('books')
            ->join('book_type','books.type_id','=','book_type.type_id')
            ->select('books.*', 'book_type.*')
            ->get();
        return view('admin.book__manager', compact('books'));
    }

    public function admin_delete_books($id)
    {
        $books = DB::table('books')->where('books_id',$id)->delete();
        $rawMsg = 'Bạn đã xóa sách thành công';
        $msg = "$rawMsg";
        return redirect()->back()->with("delete_mes", $msg);
    }

    public function account__manager()
    {
        $user = DB::table('user')->get();
        return view('admin.account__manager',compact('user'));
    }

    public function delete_user(Request $request, $id)
    {
        $user = DB::table('user')->where('user_id', $id)
            ->update([
                'role' => $request->role,
            ]);
        $rawMsg = 'Bạn đã vô hiệu hóa người dùng thành công';
        $msg = "$rawMsg";
        return redirect()->back()->with("delete_mes", $msg);
    }

//    public function delete_user($id)
//    {
//        $user = DB::table('user')->where('user_id',$id)
//            ->delete();
//        $rawMsg = 'Bạn đã vô hiệu hóa người dùng thành công';
//        $msg = "$rawMsg";
//        return redirect()->back()->with("delete_mes", $msg);
//    }
    public function type_book_manager(){
        $type = DB::table('book_type')->get();
        return view('admin.typebook_manager',compact('type'));
    }
    public function update_type_book_manager(Request $request, $id)
    {
        $type = DB::table('book_type')->where('type_id', $id)
            ->update([
                'state' => $request->state,
            ]);
        $rawMsg = 'Bạn đã cập nhật thành công!';
        $mess_update = "$rawMsg";
        return redirect()->back()->with('mess_update',$mess_update);
    }

        public function adminLogin()
    {
        return view('admin.adminLogin');
    }

    public function postLoginAdmin(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password,'role'=>1])){
            $rawMsg = 'Bạn đã đăng nhập thành công, Chào mừng bạn đến với trang quản lý!';
            $msg = "<p><div class=\"alert alert-success\">$rawMsg</div></p>";
            return redirect()->route('account__manager')->with("message", $msg);
        }else{
            $rawMsg = 'Bạn đã nhập sai email hoặc mật khẩu!';
            $msg = "<p><div class=\"alert alert-danger\">$rawMsg</div></p>";
            return redirect()->route('adminLogin')->with("message", $msg);
        }
    }
}
