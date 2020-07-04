@extends('master')
@section('content')
    <div class="container slide_detail_book">
        <img src="/images/slide_profile.jpg" alt="" srcset="" width="100%" height="100%">
        @if (Auth::check() && Auth::user()->user_id != $user->user_id)
            <p class="font-3 font-w500 p--slide_profile" style="right: 45%;">Owner info</p>
        @else
            <p class="font-3 font-w500 p--slide_profile">Your info</p>
        @endif
        <p class="font-2 font-w500 slide_profile">Introduction</p>
    </div>
    <div class="container index">

        <div class="detail_page_type">
                <span>
                    <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i
                        class="fa fa-caret-right"></i>&ensp;
                    <a class="font-3 font-w400" href="">Thông tin cá nhân </a>
                </span>
        </div>
        @if(session("message_return"))
            <?php echo session("message_return"); ?>
        @endif
        @if(session("message_fail"))
            <?php echo session("message_fail"); ?>
        @endif
        <div class="d-flex profile">
            <div class="profile__image">
                <img src="/{{$user->avatar}}" alt="" width="277px" height="280px" style="border-radius: 135px;">

            </div>
            <div class="profile__information">
                {{$user->user_name}}
                {{$user->email}}
                <div><a href="{{route('get_edit__profile')}}">54534</a></div>


            </div>
        </div>

        <p class="font-2 font-w400 title_name">Sách sở hữu:</p>
        <div class="d-flex row index__books container">

            @foreach($books as $book)
                <div class="col-3 d-flex position_book">
                    <a href={{route('books_detail',$book->books_id)}}>
                        <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                        <p class="link-name">{{$book->book_name}}</p></a>
                </div>
            @endforeach
        </div>

        <p class="font-2 font-w400 title_name">Lịch sử mượn sách:</p>

        @foreach($transactions as $transaction)
            @if(isset(Auth::user()->user_id) && (Auth::user()->user_id == $transaction->user_id))
            <!--/ Property Star /-->
                <section class="section-property">
                    <div class="container">
                        <div class="row bg-light py-4 mb-3">
                            <div class="col-md-2">
                                <img src="/{{$transaction->image}}" alt="" width="140px" height="150px">                            </div>
                            <div class="col-md-2">
                                <div class="font-weight-bold">Sản phẩm: <span
                                        class="font-weight-normal">{{$transaction->book_name}}</span>
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div class="font-weight-bold">Sản phẩm: <span
                                        class="font-weight-normal">{{$transaction->author}}</span>
                                </div>


                            </div>
                            <div class="col-md-2">
                                <div class="font-weight-bold">Sản phẩm: <span
                                        class="font-weight-normal">{{$transaction->publisher}}</span>
                                </div>

                            </div>


                            <div class="col-md-2">
                                <div class="font-weight-bold form-group">
                                    <span class="font-weight-normal">{{$transaction->date_borrow}}</span>
                                </div>
                                <div class="font-weight-bold form-group">
                                    <span class="font-weight-normal">{{$transaction->date_return}}</span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <form action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']; ?>"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{$transaction->transaction_id}}">
                                    @if($transaction->state == 1)
                                        <input class="btn btn-outline-primary" type="submit" value="Trả sách" style="margin-top: 52px;">
                                    @else
                                        <p class="btn btn-dark disabled">Đã trả</p>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Property End /-->
            @else
                <h1 class="title-a">
                    Chưa có sản phẩm
                </h1>
            @endif
        @endforeach


    </div>


@endsection
