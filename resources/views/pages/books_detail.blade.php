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
                        @if (Auth::check() && Auth::user()->user_id != $book->uploader)
                            <form action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; ?>" method="POST">
                                @csrf
                                <input class="borrow_button" type="submit" value="Mượn sách">
                            </form>
                        @else
                        @endif
                            <li><a class="font-2 font-w500" href="{{route('profile',$book->uploader)}}">Người sở hữu</a></li>

                    </ul>
                    <p class="font-3 font-w400">Giới thiệu:</p>
                    <p class="font-2 font-w400 detail_name">{!! $book->status !!}</p>
                </div>
            </div>
            <div class="comment_books">
                <p class="font-3 font-w500">Bình luận:</p>
                <div>

                </div>
                <div class="comment_books_input">
                    <div class="form-group">
                        <label for="comment"><b class="font-3 font-w500">Nhập bình luận của bạn:</b></label>
                        <textarea name="comment" id="comment"></textarea>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('js')
    <script>CKEDITOR.replace('comment');</script>
@endsection
