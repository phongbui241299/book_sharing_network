@extends('master')
@section('content')
<div class="container login__index">
    <div class="container login__index--inside">
        @foreach($user as $use)
        <form action="{{route('post_change_pass',$use->user_id)}}" method="POST" enctype="multipart/form-data" class="form__group">
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
