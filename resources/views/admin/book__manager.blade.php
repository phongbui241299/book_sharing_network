@extends('master')
@section('content')
    <div class="container">
        <a href="{{route('book__manager')}}">Quản lý sách</a>
        <a href="{{route('account__manager')}}">Quản lý tài khoản</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã loại</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col"></th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-active">
                <form action="dashboard_bill.php" method="post">
                    <th scope="row">?</th>
                    <td scope="row">
                        <input class="form-control form-text" type="number" placeholder="Mã sách"
                               name="MSKH">
                    </td>
                    <td>
                        <input class="form-control form-text" type="number" name="MSNV"
                               placeholder="Mã nhân viên">
                    </td>
                    <td>
                        <input class="form-control form-text" type="date" name="NgayDH"
                               placeholder="Ngày đặt hàng">
                    </td>
                    <td>
                        <input class="form-control form-text" type="text" name="TrangThai"
                               placeholder="Trạng thái">
                    </td>
                    <td>
                        <input name='add' value='Thêm' type='submit' class='btn btn-info'>
                    </td>
                </form>
            </tr>
            <tr>
                <form class='mr-1' action='dashboard_bill.php' method='post'>
                    <input type='hidden' name='SoDonDH' value='$dh[0]'>
                    <th scope=\"row\">$dh[0]</th>
                    <td><input class='form-control form-text' type='text' name='MSKH' value='$dh[1]'></td>
                    <td><input class='form-control form-text' type='text' name='MSNV' value='$dh[2]'></td>
                    <td><input class='form-control form-text' type='text' name='NgayDH' value='$dh[3]'></td>
                    <td><input class='form-control form-text' type='text' name='TrangThai' value='$dh[4]'></td>
                    <td class='d-flex justify-content-start'>
                        <div role='group' aria-label='Basic example'>
                            <input name='update' value='Sửa' type='submit' class='btn btn-outline-info'>
                            <input name='delete' value='Xoá' type='submit' class='btn btn-outline-danger'>
                        </div>
                </form>
                </form>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
