<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
//use MongoDB\Driver\Session;
use Auth;
use Session;
class AccountController extends Controller
{

//------- dang ki dang nhap -------

    public function getRegister()
    {
        $user_login = DB::table('user')->get();
        $city = DB::table('devvn_tinhthanhpho')->get();
        return view('pages.sign__up',compact('user_login','city'));
    }

    public function getLogin(){
        return view('pages.sign__in');
    }

    public function postRegister(Request $request)
    {
        $user = new User;
        $user->user_name = ucwords($request->name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $files = $request->avatar;
        $file_name = time() . "_" . md5(rand(0, 99999)) . $files->getClientOriginalName();
        $user->avatar =  "uploads/avatar/".$file_name;
        $files->move('uploads/avatar', $file_name);
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->ward = $request->ward;
        $user->save();
        $rawMsg = 'Bạn đã đăng kí thành công hãy đăng nhập!';
        $msg = "$rawMsg";
        return redirect('account/login')->with('mess_register',$msg);

    }

    public function postLogin(Request $request){
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password,'role'=>0])){
            $rawMsg = 'Bạn đã đăng nhập thành công!';
            $msg = "<p><div class=\"alert alert-success\">$rawMsg</div></p>";
            return redirect()->route('index')->with("message", $msg);
        }else{
            $rawMsg = 'Bạn đã nhập sai email hoặc mật khẩu!';
            $msg = "<p><div class=\"alert alert-danger\">$rawMsg</div></p>";
            return redirect()->route('getLogin')->with("message", $msg);
        }
    }
    public function getLogout(){
        Auth::logout();
        $rawMsg = 'Bạn đã đăng xuất!';
        $msg = "<p><div class=\"alert alert-primary\">$rawMsg</div></p>";
//        Session::flush();
        return redirect()->route('getLogin')->with("message", $msg);
    }
}

