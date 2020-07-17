@extends('master')
@section('content')

<div class="container login__index">
    <div class="detail_page_type">
                <span>
                    <a class="font-3 font-w400" href="{{route('index')}}">Trang chủ</a>&ensp;<i class="fa fa-caret-right"></i>&ensp;
                    <a class="font-3 font-w400" href="">Đổi mật khẩu </a>&ensp;
                </span>
    </div>
    <div class="container login__index--inside">
        @foreach($user as $use)
        <form action="{{route('post_change_pass',$use->user_id)}}" name="register" method="POST" enctype="multipart/form-data" class="form__group">
            @csrf
            @if (session('mess_update_pass'))
                <p class="alert alert-success">{{session('mess_update_pass')}}</p>
            @endif
            <h2 class="font-3 font-w500">Đổi mật khẩu</h2>
            @csrf
                <div class="form-group">
                    <input type="checkbox" name="changePassword" id="changePassword">
                    <label>Đổi mật khẩu</label>
                    <input type="password" disabled="" value="{{$use->password}}" class="form-control password" id="password" placeholder="Nhập vào mậu khẩu" name="password" required>
                </div>
                <div class="form-group">
                    <label for="re_password"><b class="font-3 font-w500">Nhập lại mật khẩu:</b></label>
                    <input type="password" disabled="" name="re_password"  value="{{$use->password}}" class="form-control password" id="re_password" placeholder="Nhập lại mậu khẩu" name="repassword" required>
                </div>
            <div class="d-flex btn--add">
                <p class="font-3 font-w500 btn--add--p"><button type="submit" class="btn btn-action">Xác nhận</button></p>
            </div>
        </form>
        @endforeach
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
                password:{
                    required: true,
                    minlength:6,
                    maxlength:16
                } ,
                re_password:{
                    equalTo: "#password",
                    required: true,
                } ,

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
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".passwords").attr('disabled','');
                }
            })
        });
    </script>
    @endsection
