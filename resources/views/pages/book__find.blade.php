@extends('master')
@section('content')
    <!--start main-->
    <div class="container index">
        <p class="font-3">Kết quả tìm kiếm </p>
        @if(count($books)<=0)
           <p class="alert alert-secondary"> Không có sách cần tìm</p>
        @else
            @endif
            <div class="d-flex row index__books container">

            @foreach($books as $book)
                <div class="col-3 d-flex position_book">
                    <a href={{route('books_detail',$book->books_id)}}>
                        <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                        <p class="link-name">{{$book->book_name}}</p>
                    </a>
                </div>
            @endforeach
            </div>
    </div>
@endsection
