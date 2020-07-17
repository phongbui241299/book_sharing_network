@extends('master')
@section('content')

    @if(session("message"))
        <?php echo session("message"); ?>
    @endif
    @if(session("message_fail"))
        <?php echo session("message_fail"); ?>
    @endif
    @if(session("message_success"))
        <?php echo session("message_success"); ?>
    @endif
    @if(session("message_cmt"))
        <?php echo session("message_cmt"); ?>
    @endif
    <div class="container slide_detail_book">
        <img src="/images/slide_detail_book.jpg" alt="" srcset="" width="100%" height="100%">
        <p class="font-2 font-w500 slide_detail_book--p">Book is my best friend</p>
    </div>
    <div class="container detail_page">
    @foreach($results as $book)
            <div class="detail_page_type">
                <span>
                    <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                    <a class="font-3 font-w400" href="  ">{{$book->type_name}}</a>&ensp;<i class="fa fa-caret-right">&ensp;</i>
                    <a class="font-3 font-w400" href="{{route('books_detail',$book->books_id)}}">{{$book->book_name}}</a></span>
            </div>
            <div class="container d-flex detail_page_book">
                <div class="image_book">
                    <img src="/{{$book->image}}" alt="" width="415px" height="500px">
                </div>
                <div class="detail_book">
                    <p class="font-3 font-w400 author_name"> {{$book->author}}</p>
                    <p class="font-2 font-w500 book_name">{{$book->book_name}}</p>
                    <p class="font-3 font-w400 detail_name">{{$book->publisher}}</p>
                    <p class="font-3 font-w400 detail_name">Thể loại:  {{$book->type_name}}</p>
                    <p class="font-3 font-w400 detail_name">Số trang: {{$book->page_number}}</p>

                    <ul class="d-flex list-style-none nav__menu">
                        @if (Auth::check() && Auth::user()->user_id != $book->uploader && Auth::user()->role == 0)
                            <form action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; ?>" method="POST">
                                @csrf
                                <input class="borrow_button" type="submit" value="Mượn sách">
                            </form>
                            <li><a class="font-2 font-w500" href="{{route('profile',$book->uploader)}}">Người sở hữu</a></li>
                        @elseif(Auth::check() && Auth::user()->role == 1)
                            <input class="borrow_button" type="submit" value="Xóa sách">
                            <li><a class="font-2 font-w500" href="{{route('profile',$book->uploader)}}">Người sở hữu</a></li>
                        @endif
                        @if (!Auth::check())
                            <input class="borrow_button"  onclick="warning__borrow()" type="submit" value="Mượn sách">
                            <input class="borrow_button" style="margin-left: 70px" onclick="warning__borrow()" type="submit" value="Người sở hữu">

                        @else
                        @endif
                        @if (Auth::check() && Auth::user()->user_id == $book->uploader)
                                <li><a readonly class="font-2 font-w500" href="{{route('profile',$book->uploader)}}">Đây là sách của bạn</a></li>
                                <li><a readonly class="font-2 font-w500" href="{{route('get_edit__books',$book->books_id)}}">Sửa sách</a></li>
                                <li><a readonly class="font-2 font-w500" href="{{route('delete_books',request()->route('id'))}}">Xóa sách</a></li>

                            @else
                            @endif

                    </ul>
                    <p class="font-3 font-w400">Giới thiệu:</p>
                    <p class="font-2 font-w400 detail_name">{!! $book->status !!}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
