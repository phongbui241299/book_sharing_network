@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            @if(session("message"))
                <?php echo session("message"); ?>
            @endif
            @if(session('mess'))
                    <p class="alert alert-danger">{{session('mess')}}</p>
            @endif
                @if(session("mess_register"))
                    <p class="alert alert-success">{{session('mess_register')}}</p>
                 @endif
                <p id="borrow_button"></p>
                <h2 class="font-3 font-w500">Đăng nhập</h2>
            <form action="{{route('postLogin')}}" method="POST" name='login' class="form__group">
                @csrf
                <div class="form-group">
                    <label for="email"><b class="font-3 font-w500">Email:</b></label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập vào Email" name="email">
                </div>
                <div class="form-group">
                    <label for="password"><b class="font-3 font-w500">Mật khẩu:</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập vào mậu khẩu" name="password">
                </div>
                <p class="font-3 font-w500">
                    <button type="submit" class="btn btn-action">
                        Đăng nhập
                    </button></p>

                <p class="font-3 font-w500">Bạn chưa có tài khoản để đăng nhập? Hãy <a href="{{route('getRegister')}}">đăng ký ngay</a></p></p>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/jquery.validate.min.js"></script>
    <script>
        $("form[name='login']").validate({
            rules: {
                email: {
                    required: true,
                    maxlength:50,
                    email: true
                },
                password:{
                    required: true,
                    minlength:3,
                    maxlength:16
                } ,
            },
            messages: {
                password: {
                    required: "*Password không được để trống",
                    minlength: "*Password quá ngắn! Hãy nhập trên 3 kí tự",
                    maxlength: "*Password không được quá 16 kí tự"
                },

                email: "*Email không được để trống",
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
    @endsection
