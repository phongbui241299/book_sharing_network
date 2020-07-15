@extends('master')
@section('content')
    @if (Auth::check() && Auth::user()->role == 1)
        <div class="container">
            <div class="detail_page_type">
                    <span>
                        <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                        <a class="font-3 font-w400" href=" ">Thêm loại sách</a>&ensp;

                   </span>
            </div>
        </div>
        <div class="header__button__admin">
            <div class="d-flex container header__main">
                <div class="menu">
                    <div class="d-flex list-style-none font-w500 font-2 menu__admin">
                        <li class="nav__menu_li"><a href="{{route('book__manager')}}">Quản lý sách</a></li>
                        <li class="nav__menu_li"><a href="{{route('account__manager')}}">Quản lý tài khoản</a></li>
                        <li class="nav__menu_li"><a href="{{route('type_book_manager')}}">Quản lý loại sách</a></li>
                        <li class="nav__menu_li"><a href="{{route('add_type_books')}}">Thêm loại sách</a></li>
                    </div>
                </div>
            </div>
        </div>
        <div class="container login__index">
        <div class="container login__index--inside">
            <form action="{{route('post_type_books')}}" method="POST" enctype="multipart/form-data" class="form__group">
                @if (session('mess_type_book'))
                   <p class="alert alert-success">{{session('mess_type_book')}}</p>
                @endif
                <h2 class="font-3 font-w500">Thêm loại sách</h2>
                @csrf
                    <div class="form-group">
                        <label for="type_name"><b class="font-3 font-w500">Tên loại:</b></label>
                        <input type="text" name="type_name" class="form-control" id="type_name" aria-describedby="type_name" placeholder="Nhập vào loại sách">
                    </div>
                    <div class="form-group">
                        <label for="type_name"><b class="font-3 font-w500">Đường dẫn:</b></label>
                        <input type="text" name="slug" class="form-control" id="slug" aria-describedby="slug" placeholder="Nhập vào đường dẫn của bạn">
                    </div>
                    <div class="d-flex btn--add">
                        <p class="font-3 font-w500 btn--add--p"><button type="submit" class="btn btn-action">Thêm mới</button></p>
                        <p class="font-3 font-w500 btn--add--p"><button type="reset" class="btn btn-action">Làm lại</button></p>
                    </div>
            </form>
        </div>
    </div>

    @else
    <div class="container">
                <p class="alert alert-danger">Bạn không có quyền truy cập vào địa chỉ này!</p>
    </div>
    @endif
@endsection

