@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            @if(session("message"))
                <?php echo session("message"); ?>
            @endif
            <h2 class="font-3 font-w500">Đăng nhập Admin</h2>
            <form action="{{route('postLoginAdmin')}}" method="POST" class="form__group">
                @csrf
                <div class="form-group">
                    <label for="email"><b class="font-3 font-w500">Email</b></label>
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
            </form>
        </div>
    </div>
@endsection
