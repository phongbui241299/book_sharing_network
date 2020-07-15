@extends('master')
@section('content')
    @if (Auth::check() && Auth::user()->role == 1)
        <div class="container">
            @if(session('mess_update'))
                <p class="alert alert-success">{{session('mess_update')}}</p>
            @endif
            <div class="detail_page_type">
                    <span>
                        <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                        <a class="font-3 font-w400" href=" ">Quản lý loại sách</a>&ensp;

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
            <p class="font-3" style="color: red">* Đổi thành trạng thái 1 khi muốn ẩn loại sách</p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên loại</th>
                    <th scope="col">Viết tắt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
                </thead>
                @foreach($type as $type_book)
                <tbody>
                <tr>
                    <form class='mr-1' action='{{route('update_type_book_manager',$type_book->type_id)}}' method='post'>
                        <th scope=\"row\">{{$type_book->type_id}}</th>
                        <td scope="row">
                            <input class="form-control form-text" type="text" placeholder="Tên loại"
                                   name="type_name" readonly value="{{$type_book->type_name}}">
                        </td>
                        <td>
                            <input class="form-control form-text" type="text" name="slug"
                                   placeholder="Viết tắt" readonly value="{{$type_book->slug}}">
                        </td>
                        <td>
                            <input class="form-control form-text" type="number" name="state"
                                   value="{{$type_book->state}}">
                        </td>
                        <td class='d-flex justify-content-start'>
                            <div role='group' aria-label='Basic example'>
                                <button type='submit' class='btn btn-outline-info'> Cập nhật</button>
                            </div>
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
