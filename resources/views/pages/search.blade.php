@extends('master')
@section('content')
    <!--start main-->
{{--        @if(count($type_book)<=0)--}}
{{--            <div class="index__books-report" >--}}
{{--                <p >Không có sách cần tìm</p>--}}
{{--            </div>--}}
{{--        @else--}}

{{--            @foreach($books as $book)--}}
{{--                <div class="col-3 d-flex position_book">--}}
{{--                    <a href={{route('books_detail',$book->books_id)}}>--}}
{{--                        <img src="/{{$book->image}}" alt="" width="240px" height="280px">--}}
{{--                        <p class="link-name">{{$book->book_name}}</p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
    <div class="container index">
        <div class="d-flex row index__books container">
        @foreach($search as $value_search)
            @if($value_search != null)
                <div class="col-md-3 col-lg-3">
                    <a href={{route('books_detail',$value_search->books_id)}}>
                    <img src="/{{$value_search->image}}" alt="" width="240px" height="280px">
                        <p class="link-name">{{$value_search->book_name}}</p></a>
                </div>
            @endif
        @endforeach
        </div>
    </div>
@endsection
