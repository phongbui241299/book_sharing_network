@extends('master')
@section('content')
    <!--start main-->
    <div class="container index">
        @if(count($type_book)<=0)
            <div class="index__books-report" >
                <p >Không có sách cần tìm</p>
            </div>
        @else

            @foreach($books as $book)
                <div class="col-3 d-flex position_book">
                    <a href={{route('books_detail',$book->books_id)}}>
                        <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                        <p class="link-name">{{$book->book_name}}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection
