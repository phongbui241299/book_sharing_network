@extends('master')
@section('content')
    <div class="container login__index">
        <div class="detail_page_type">
                <span>
                    <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                    <a class="font-3 font-w400" href="">Chỉnh sửa thông tin cá nhân </a>&ensp;
                </span>
        </div>
        @if(session('mess_update'))
            <p class="alert alert-success">{{session('mess_update')}}</p>
        @endif
        <div class="container login__index--inside">
                  <h2  class="font-3 font-w500">Chỉnh sửa thông tin cá nhân</h2>
            <form action="#" method="POST" enctype="multipart/form-data" class="form__group" name="register">
                @csrf
                @foreach($user as $use)
                <div class="form-group">
                    <label for="name"><b class="font-3 font-w500">Họ tên người dùng:</b></label>
                    <input type="text" value="{{$use->user_name}}" class="form-control" id="name" placeholder="Nhập và họ tên người dùng" name="name" required>
                </div>
                    <div class="form-group">
                        <label for="email"><b class="font-3 font-w500">Email</b></label>
                        <input type="text" readonly class="form-control" value="{{$use->email}}" id="email" placeholder="Nhập vào Email" name="email" >
                    </div>

                <div class="form-group">
                    <label><b class="font-3 font-w500">Ảnh đại diện:</b></label>
                    <input type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="phone"><b class="font-3 font-w500">Số điện thoại:</b></label>
                    <input type="text" value="{{$use->phone}}" class="form-control" id="phone" placeholder="Nhập vào số điện thoại" name="phone" required>
                </div>
                @foreach($address as $place)
                <div class="form-group">
                    <label for="address"><b class="font-3 font-w500">Địa chỉ:</b></label>
                    <select name="city" id="city_edit">

                        <option selected disabled value="{{$place->city}}">{{$place->city_name}}</option>
                        @foreach($city as $thecity)
                            <option value="{{$thecity->matp}}">{{$thecity->city_name}}</option>
                        @endforeach
                    </select>
                    <select name="district" id="district_edit">
                        <option selected disabled value="{{$place->district}}">{{$place->district_name}}</option>
                    </select>
                    <select name="ward" id="ward_edit">
                        <option selected disabled value="{{$place->ward}}" >{{$place->ward_name}}</option>
                    </select>
                </div>
                @endforeach
                @endforeach
                <p class="font-3 font-w500"><button type="submit" class="btn btn-action">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="/js/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script>
        $("form[name='register']").validate({
            rules: {
                email: {
                    required: true,
                    maxlength:50,
                    email: true
                },
                name: {
                    required: true,
                    maxlength:50,
                },
                phone: {
                    required: true,
                    digits: true
                },
                password:{
                    required: true,
                    minlength:6,
                    maxlength:16
                } ,
                re_password:{
                    equalTo: "#password",
                    required: true,
                } ,
                city:{
                    required: true,
                } ,
                district:{
                    required: true,
                } ,
                ward:{
                    required: true,
                } ,
                avatar:{
                    required: true,
                },
            },
            messages: {
                password: {
                    required: "*Password không được để trống",
                    minlength: "*Password quá ngắn! Hãy nhập trên 6 kí tự",
                    maxlength: "*Password không được quá 16 kí tự"
                },
                re_password: {
                    equalTo: "* Mật khẩu không trùng khớp!",
                    required: "* Trường này không được để trống",
                },
                email: "* Email không được để trống",
                name: {
                    required: "* Tên không được để trống",
                    maxlength:"* Tên không quá 50 kí tự",
                },
                phone:{
                    required:  "* Số điện thoại không được để trống",
                    digits: "* Trường này chỉ bao gồm các số"
                },
                city:{
                    required: "* Trường không được để trống",
                },
                district:{
                    required: "* Trường không được để trống",
                },
                ward:{
                    required: "* Trường không được để trống",
                },
                avatar:{
                    required: "* Vui lòng thêm ảnh vào"
                }
            },
            highlight: function(element) {
                $(element).parent().addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass('has-error');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });


    </script>

    <script src="/js/Application.js"></script>
@endsection

