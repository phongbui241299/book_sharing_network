@extends('master')
@section('content')
    @if (Auth::check() && Auth::user()->role == 1)
        <div class="container">
            <div class="detail_page_type">
                    <span>
                        <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                        <a class="font-3 font-w400" href=" ">Quản lý tài khoản</a>&ensp;

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
        <div class="container">

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ảnh đại diện</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            @foreach($user as $mem)
            <tbody>
            <tr>
                <form class='mr-1' action='{{route('delete_user',$mem->user_id)}}' method='post'>
                    @csrf
                    @if($mem ->role == 0)
                    <input type='hidden' name='SoDonDH' value='$dh[0]'>
                    <th scope=\"row\">{{$mem->user_id}}</th>
                    <td><img src="/{{$mem->avatar}}" alt="" width="120px" height="100px"></td>
                        <td><input class='form-control form-text' readonly type='text' name='user_name' value='{{$mem->user_name}}'></td>
                    <td><input readonly class='form-control form-text' type='text' name='email' value='{{$mem->email}}'></td>
                    <td><input readonly class='form-control form-text' type='text' name='phone' value='{{$mem->phone}}'></td>
                    <td class='d-flex justify-content-start'>
                        <div role='group' aria-label='Basic example'>
                            <button type='submit' class='btn btn-outline-danger'>Xóa</button>
                        </div>
                    </td>
                    @else
                    @endif
                </form>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    @else
        <div class="container">
            <p class="alert alert-danger">Bạn không có quyền truy cập vào địa chỉ này!</p>
        </div>
    @endif
@endsection
