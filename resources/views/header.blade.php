<div class="header">
    <div class="header__top">
        <div class="container">
            <div class="top_bar_vertical d-flex justify-content-between">
                <div class="intro text-white font-12 font-1">
                    <p class="my-0 font-w700">Welcome to Book Sharing Network</p>
                </div>
                <div class="icon_contact">
                    <a href="#"><span><i class="fa fa-twitter"></i></span></a>
                    <a href="#"><span><i class="fa fa-instagram"></i></span></a>
                    <a href="#"><span><i class="fa fa-facebook"></i></span></a>
                    <a href="#"><span><i class="    fa fa-envelope"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header__button">
        <div class="d-flex container header__main">
            <div class="logo">
                <a href="/">
                    <img src="/images/logo.png" alt="" width="90px" height="70px"/>
                </a>
            </div>
            <div class="menu">
                <div class="d-flex list-style-none font-w500 font-2 nav__menu">
                    <li class="nav__menu_li"><a href="/">Trang Chủ</a></li>
                    <li class="nav__menu_li"><a href="#">Thể Loại&nbsp;<i class="fa fa-angle-down"></i></a>
                        <ul class="menu__nav list-style-none font-w400 font-3">
                            @foreach($book_type as $type)
                                <li><a href="{{route("getBookByCategory",$type->slug)}}">{{$type->type_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav__menu_li"><a href="#">Liên Hệ&nbsp;<i class="fa fa-angle-down"></i></a>
                        <div class="">
                            <ul class="menu__nav list-style-none font-w400 font-3">
                                <li><a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin">Email</a></li>
                                <li><a href="https://www.facebook.com/tranthuanphong.quach/">Facebook</a></li>
                                <li><a href="https://www.instagram.com/cruz.phong_tp/">Instargam</a></li>
                                <li><a href="#">Phone</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav__menu_li">
                        <a href="{{route('add__books')}}">Đăng sách &nbsp;<i class="fa fa-upload"></i></a>
                    </li>

                </div>
            </div>
            <div class="right__option d-flex list-style-none">
                <div class="account font-2 font-w400">
                    @if(Auth::check() && Auth::user()->user_role == 0)
                        <li class="nav__menu_li"><a href="#">
                                <p class="font-3 font-w400 avatar_intro">
                                <img src="/{{Auth::user()->avatar}}" alt="" srcset="" width="50px" height="50px" style="border-radius: 30px">
                                    &nbsp;<i class="fa fa-angle-down"></i>
                                {{Auth::user()->user_name}}

                                    </a></p>
                            <ul class="menu__nav list-style-none font-w400 font-3">
                                <li><a href="{{route('profile',Auth::user())}}">Thông tin cá nhân</a></li>
                                <li><a href="{{route('getLogout')}}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav__menu_li"><a href="#"><p><i class="fa fa-user"></i></p></a>
                            <ul class="menu__nav list-style-none font-w400 font-3">
                                    <li><a href="{{route('getRegister')}}">Đăng Kí</a></li>
                                    <li><a href="{{route('getLogin')}}">Đăng Nhập</a></li>
                            </ul>
                        </li>
                    @endif
                </div>
                <div class="cart font-2 font-w400">
                    <a href="#"><p><i class="fa fa-shopping-bag" aria-hidden="true"></i></p></a>
                </div>
                <div class="search font-2 font-w400">
                    <p><i class="fa fa-search" aria-hidden="true"></i></p>
                </div>
                <div class="bar font-2 font-w400">
                    <p><i class="fa fa-bars" id="fa-bars" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="right__sidebars">
        <div class="overlay">
        </div>
        <div class="bar__content">
            <i class="fa fa-window-close"></i>
            <div class="bar__content--logo">
                <img src="/images/logo.png" alt="" width="90px" height="70px"/>
            </div>
            <div class="bar__content--info">
                <p class="font-2 font-w400"><i class="fa fa-map-marker"></i>&ensp;Dai hoc Can Tho, XuanKhanh, NinhKieu, CanTho</p>
                <p class="font-2 font-w400"><i class="fa fa-phone">&ensp; </i> (212) 862-3680</p>
                <p class="font-2 font-w400"><i class="fa fa-envelope-o">&ensp; </i> phongb1709617@student.ctu.edu.vn.com</p>
            </div>
        </div>
    </div>
{{--<div class="search__content">--}}
{{--    <form action="{{action("HomeController@findBookByName")}}" method="get">--}}
{{--        <input type="text" name="search" id="" placeholder="Search"/>--}}
{{--        <button type="submit">Search</button>--}}
{{--    </form>--}}
{{--</div>--}}

<div class="overlay__search">
    <div class="search__content">
        <div class="overlay__header--search">
            <form action="{{action("HomeController@findBookByName")}}" method="get">
                <input class="font-2 font-w400 search__form" type="text" name="search" id="" placeholder="Search"/>
            </form>
        </div>
    </div>
</div>
