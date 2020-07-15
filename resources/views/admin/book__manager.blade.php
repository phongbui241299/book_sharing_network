@extends('master')
@section('content')
    @if (Auth::check() && Auth::user()->role == 1)
        <div class="container">
            @if(session('delete_mes'))
                <p class="alert alert-success">{{session('delete_mes')}}</p>
            @endif
            <div class="detail_page_type">
                    <span>
                        <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                        <a class="font-3 font-w400" href=" ">Quản lý sách</a>&ensp;

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
        <table class="table">
            <thead>
            <tr style="text-align: center">
                <th scope="col">ID</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Số trang</th>
                <th scope="col">Nhà xuất bản</th>
                <th scope="col">Loại sách</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col">Ngày cập nhật</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            @foreach($books as $book)
            <tbody class="row_book" >
            <tr>
                <form class='mr-1' action='{{route('admin_delete_books',$book->books_id)}}' method='post'>
                    @csrf
                    <th scope=\"row\">{{$book->books_id}}</th>
                    <td>
                        <img src="/{{$book->image}}" alt="" width="120px" height="150px">
                    </td>
                    <td>
                        <input class="form-control form-text bookname" type="text" name="book_name"
                               placeholder="Tên sách" value="{{$book->book_name}}">
                    </td>
                    <td>
                        <input class="form-control form-text bookauthor" type="text" name="author"
                               placeholder="Tác giả" value="{{$book->author}}">
                    </td>
                    <td>
                        <input class="form-control form-text page_number" type="number" placeholder=""
                               name="page_number" value="{{$book->amount}}">
                    </td>
                    <td>
                        <input class="form-control form-text publisher" type="text" name="publisher"
                               placeholder="Nhà xuất bản" value="{{$book->publisher}}">
                    </td>
                    <td>
                        <input class="form-control form-text type_name" type="text" name="publisher"
                               placeholder="Nhà xuất bản" value="{{$book->type_name}}">
                    </td>

                    <td>
                        <input name='updated_at' value='{{$book->updated_at}}' type='date and time' class='btn btn-info updated'>
                    </td>
                    <td>
                        <input name='created_at' value='{{$book->created_at}}' type='date and time' class='btn btn-info created'>

                    <td class='d-flex justify-content-start'>
                        <div role='group' aria-label='Basic example'>
                            <button type='submit' class='btn btn-outline-danger'>Xoá</button>
                        </div>
                </form>
            </tr>
            </tbody>
            @endforeach
        </table>
    @else
        <div class="container">
            <p class="alert alert-danger">Bạn không có quyền truy cập vào địa chỉ này!</p>
        </div>
    @endif
@endsection
