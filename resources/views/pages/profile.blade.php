@extends('master')
@section('content')
    <div class="container slide_detail_book">

        @if (Auth::check() && Auth::user()->user_id != $user->user_id)
            <img src="/images/slide_owner.jpg" alt="" srcset="" width="100%" height="100%">
            <p class="font-3 font-w500 p--slide_profile" style="right: 45%;color: white">Owner info</p>
            <p class="font-2 font-w500 slide_profile" style="color:white;">Introduction</p>

        @elseif(!Auth::check())
            <img src="/images/slide_owner.jpg" alt="" srcset="" width="100%" height="100%">
            <p class="font-3 font-w500 p--slide_profile" style="right: 45%;color: white">Owner info</p>
            <p class="font-2 font-w500 slide_profile" style="color:white;">Introduction</p>

        @else
            <img src="/images/slide_profile.jpg" alt="" srcset="" width="100%" height="100%">
            <p class="font-3 font-w500 p--slide_profile">Your info</p>
            <p class="font-2 font-w500 slide_profile">Introduction</p>
        @endif
    </div>
    <div class="container index">
        <div class="detail_page_type">
                <span>
                    <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
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
                <p class="font-3 font-w400">Tên người dùng: {{$user->user_name}}</p>
                <p class="font-3 font-w400">Email : {{$user->email}}</p>
                <p class="font-3 font-w400">Phone: {{$user->phone}}</p>
                @foreach($address as $place)
                <p class="font-3 font-w400">Địa chỉ: {{$place->city_name}}, {{$place->district_name}}, {{$place->ward_name}}</p>
                @endforeach
                <p class="font-3 font-w400">Ngày tham gia:  {{$user->created_at}}</p>


            </div>
        </div>
    @if(Auth::check() && Auth::user()->role==1)
            <div class="detail_book">
            <ul class="d-flex list-style-none nav__menu">
            <li><a class="font-2 font-w500" href="{{route('book__manager')}}">Trang quản lí</a></li>
                @if (Auth::check() && Auth::user()->user_id == $user->user_id)
                    <li><a  class="font-2 font-w500" href="{{route('get_edit__profile',$user->user_id)}}">Chỉnh sửa thông tin</a></li>
                @else
                @endif
            </ul>
            </div>
        @else
            @if (Auth::check() && Auth::user()->user_id == $user->user_id)
                <div class="detail_book">
                    <ul class="d-flex list-style-none nav__menu">
                <li><a  class="font-2 font-w500" href="{{route('get_edit__profile',$user->user_id)}}">Chỉnh sửa thông tin</a></li>
                <li><a class="font-2 font-w500" href="{{route('get_change_pass',$user->user_id)}}">Đổi mật khẩu</a></li>
                    </ul>
                </div>
            @else
            @endif
            <p class="font-2 font-w400 title_name" style="padding-bottom: 0">Sách sở hữu:</p>
            <div class="d-flex row index__books container">

                @foreach($books as $book)
                    <div class="col-3 d-flex position_book">
                        <a href={{route('books_detail',$book->books_id)}}>
                            <img src="/{{$book->image}}" alt="" width="240px" height="280px">
                                <p class="link-name">{{$book->book_name}}</p></a>
                    </div>
                @endforeach
            </div>
            @if (Auth::check() && Auth::user()->user_id == $user->user_id)
            <p class="font-2 font-w400 title_name">Lịch sử mượn sách:</p>
            @else
            @endif
            @foreach($transactions as $transaction)
                @if(isset(Auth::user()->user_id) && (Auth::user()->user_id == $transaction->user_id))

                    <!--/ Property Star /-->
                    <section class="section-property">
                        <div class="container">
                            <div class="row bg-light py-4 mb-3">
                                <div class="col-md-2">
                                    <img src="/{{$transaction->image}}" alt="" width="140px" height="150px">                            </div>
                                <div class="col-md-2">
                                    <div class="font-weight-bold">Tên sách:</br>
                                        <span class="font-weight-normal">{{$transaction->book_name}}</span>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <div class="font-weight-bold">Tác giả:</br> <span
                                            class="font-weight-normal">{{$transaction->author}}</span>
                                    </div>


                                </div>
                                <div class="col-md-2">
                                    <div class="font-weight-bold">Nhà xuất bản:</br> <span
                                            class="font-weight-normal">{{$transaction->publisher}}</span>
                                    </div>

                                </div>


                                <div class="col-md-2">
                                    <div class="font-weight-bold form-group">Ngày mượn</br>
                                        <span class="font-weight-normal">{{$transaction->date_borrow}}</span>
                                    </div>
                                    <div class="font-weight-bold form-group">Ngày trả</br>
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
    @endif
        @endforeach
    @endif


@endsection
