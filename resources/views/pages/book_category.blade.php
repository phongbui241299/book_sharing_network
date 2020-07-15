@extends('master')
@section('content')
    <div class="d-flex container slide_category_book">
        <img src="/images/slide_category_book.jpg" alt="" srcset="" width="100%" height="350px">
        <p class="font-3 font-w500 slide_category_book--icon">❦</p>
        <p class="font-3 font-w500 slide_category_book--author"> Robertson Davies </p>
        <p class="font-2 font-w500 slide_category_book--status">
            Một cuốn sách thực sự hay nên đọc trong tuổi trẻ, rồi đọc lại khi đã trưởng thành, và một nửa lúc tuổi già,
            giống như một tòa nhà đẹp nên được chiêm ngưỡng trong ánh bình minh, nắng trưa và ánh trăng. </p>
    </div>
    <div class="container index">
        <div class="detail_page_type">
            <span>

                <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;
                    <i class="fa fa-caret-right"></i>&ensp;
            </span>
        </div>

        <div class="d-flex row index__books container">
            @if(count($filter_type_book)<=0)
                <div class="container">
                    <p class="alert alert-secondary">Không có loại sách cần tìm</p>
                </div>
                    @else
                @foreach($filter_type_book as $book)
                    @if($book -> role == 3)
                    @else
                    <div class="col-3 d-flex position_book">
                        <a href={{route('books_detail',$book->books_id)}}>
                            <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                            <p class="link-name">{{$book->book_name}}</p>
                        </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection
