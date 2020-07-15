@extends('master')
@section('content')
    @if(session("message"))
        <?php echo session("message"); ?>
    @endif
    @if(session('delete_mes'))
        <p class="alert alert-success">{{session('delete_mes')}}</p>
    @endif

    @include('slick')
    <div class="container index">
        <div class="d-flex index__filter">
            <ul class="d-flex list-style-none index__filter__menu">
                <li class="nav__filter"><a href="#">Tất cả</a></li>
                <li class="nav__filter" style="margin-left: 35px;"><a href="#">Mới nhất</a></li>
{{--                <li><a href="#">Tác giả hot</a></li>--}}
            </ul>
        </div>
        <div class="d-flex row index__books container">
            @foreach($books as $book)
            <div class="col-3 d-flex position_book">
                <a href={{route('books_detail',$book->books_id)}}>
                    <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                    <p class="link-name">{{$book->book_name}}</p></a>
            </div>
            @endforeach
{{--            {{ $books->links() }}--}}
        </div>
        <div class="index__designer">
            <p class="font-2 font-w400 title_name">Author of the website:</p>
            <div class="d-lex row profile__image" style="width: 100%">
                <div class="profile__image__designer">
                    <a href="{{route('contact')}}">
                        <img src="/images/avatar__author__1.jpg" alt="" width="175px" height="175px" style="border-radius: 90px;">
                    </a>
                    <p class="font-3 font-w400 designer a">Quách Trần Thuận Phong</p>
                    <p class="font-3 font-w400 role">Tác giả</p>
                    <p class="font-3 font-w400 role">Sinh viên ĐH Cần Thơ</p>

                </div>
                <div class="profile__image__designer">
                    <a href="{{route('contact')}}">
                        <img src="/images/avatar__author__2.jpg" alt="" width="175px" height="175px" style="border-radius: 90px;">
                    </a>
                    <p class="font-3 font-w400 designer">Phan Ngọc Thảo</p>
                    <p class="font-3 font-w400 role">Tác giả</p>
                    <p class="font-3 font-w400 role">Sinh viên ĐH Cần Thơ</p>

                </div>
                <div class="profile__image__designer">
                    <img src="/images/avatar__author__3.jpg" alt="" width="175px" height="175px" style="border-radius: 90px;">
                    <p class="font-3 font-w400 designer">TS: Lưu Tiến Đạo</p>
                    <p class="font-3 font-w400 role">Giáo viên hướng dẫn</p>
                    <p class="font-3 font-w400 role">Giảng viên ĐH Cần Thơ</p>


                </div>
            </div>
        </div>

        </div>


@endsection
