@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            @if(session("message"))
                <?php echo session("message"); ?>
            @endif
            @if(session("mess"))
                    <p><div class="alert alert-danger"><?php echo session("mess"); ?></div></p>
            @endif
                @if(session("mess_register"))
                    <?php echo session("mess_register"); ?>
                @endif
            <h2 class="font-3 font-w500">Đăng nhập</h2>
            <form action="{{route('postLogin')}}" method="POST" class="form__group">
                @csrf
                <div class="form-group">
                    <label for="email"><b class="font-3 font-w500">Email:</b></label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập vào Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><b class="font-3 font-w500">Mật khẩu:</b></label>
                    <input type="password" class="form-control" id="password" placeholder="Nhập vào mậu khẩu" name="password" required>
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
