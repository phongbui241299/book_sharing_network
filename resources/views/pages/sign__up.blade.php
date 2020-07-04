@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            <h2  class="font-3 font-w500">Đăng kí</h2>
            <form action="{{route('postRegister')}}" method="POST" enctype="multipart/form-data" class="form__group">
                @csrf
                <div class="form-group">
                    <label for="name"><b class="font-3 font-w500">Họ tên người dùng:</b></label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập và họ tên người dùng" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email"><b class="font-3 font-w500">Email</b></label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập vào Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><b  class="font-3 font-w500">Mật khẩu:</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập vào mậu khẩu" name="password" required>
                </div>
                <div class="form-group">
                    <label for="re_password"><b class="font-3 font-w500">Nhập lại mật khẩu:</b></label>
                    <input type="password" class="form-control" id="re_password" placeholder="Nhập lại mậu khẩu" name="repassword" required>
                </div>
                <div class="form-group">
                    <label><b class="font-3 font-w500">Ảnh đại diện:</b></label>
                    <input type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="phone"><b class="font-3 font-w500">Số điện thoại:</b></label>
                    <input type="text" class="form-control" id="phone" placeholder="Nhập vào số điện thoại" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="provinces"><b class="font-3 font-w500">Địa chỉ:</b></label>
                    <select id="provinces" name="address">
                    </select>
                </div>
                <p class="font-3 font-w500"><button type="submit" class="btn btn-action">Đăng kí</button>
                <p class="font-3 font-w500">Bạn đã có tài khoản để đăng nhập? Hãy <a href="{{route('getLogin')}}">đăng nhập ngay</a></p></p>
            </form>
        </div>
    </div>
@endsection
