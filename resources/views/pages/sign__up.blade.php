@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            <h2  class="font-3 font-w500">Đăng kí</h2>
            <form action="{{route('postRegister')}}" method="POST" enctype="multipart/form-data" name="register" class="form__group">
                @csrf
                <div class="form-group">
                    <label for="name"><b class="font-3 font-w500">Họ tên người dùng:</b></label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập và họ tên người dùng" name="name" >
                </div>
                <div class="form-group">
                    <label for="email"><b class="font-3 font-w500">Email</b></label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập vào Email" name="email" >
                </div>
                <div class="form-group">
                    <label for="password"><b  class="font-3 font-w500">Mật khẩu:</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập vào mậu khẩu" name="password" >
                </div>
                <div class="form-group">
                    <label for="re_password"><b class="font-3 font-w500">Nhập lại mật khẩu:</b></label>
                    <input type="password" class="form-control" id="re_password" placeholder="Nhập lại mậu khẩu" name="re_password" >
                </div>
                <div class="form-group">
                    <label><b class="font-3 font-w500">Ảnh đại diện:</b></label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                    <label for="phone"><b class="font-3 font-w500">Số điện thoại:</b></label>
                    <input type="text" class="form-control" id="phone" placeholder="Nhập vào số điện thoại" name="phone" >
                </div>
                <div class="form-group">
                    <label for="address"><b class="font-3 font-w500">Địa chỉ:</b></label>
                    <select name="city" id="city">

                        <option selected disabled>Chọn thành phố</option>
                        @foreach($city as $thecity)
                            <option value="{{$thecity->matp}}" data-id="{{$thecity->city_name}}">{{$thecity->city_name}}</option>
                        @endforeach
                    </select>
                    <select name="district" id="district">
                        <option selected disabled>Chọn quận huyện</option>
                    </select>
                    <select name="ward" id="ward">
                        <option selected disabled>Chọn xã phường</option>
                    </select>
                </div>
                <p class="font-3 font-w500"><button type="submit" class="btn btn-action">Đăng kí</button>
                <p class="font-3 font-w500">Bạn đã có tài khoản để đăng nhập? Hãy <a href="{{route('getLogin')}}">đăng nhập ngay</a></p></p>
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
                    required:true,
                    accept: "jpg,jpeg,png",
                },
            },
            messages: {
                password: {
                    required: "* Password không được để trống!",
                    minlength: "* Password quá ngắn! Hãy nhập trên 6 kí tự",
                    maxlength: "* Password không được quá 16 kí tự"
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
                    required: "* Vui lòng thêm ảnh vào",
                    accept: "* Chỉ chấp nhận file dạng ảnh!"
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

