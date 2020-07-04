@extends('master')
@section('content')
        <div class="container login__index">
            <div class="container login__index--inside">
                <form action="{{route('post_add_books')}}" method="POST" enctype="multipart/form-data" class="form__group">
                    @if (session('message'))
                        <div class="alert alert-success"> <p>{{session('message')}}</p></div>
                    @endif
                    <h2 class="font-3 font-w500">Thêm sách</h2>
                    @csrf
                    <div class="form-group">
                        <label><b class="font-3 font-w500">Ảnh sách:</b></label>
                        <input type="file" name="book_image">

                        <div class="form-group">
                            <label for="bookname"><b class="font-3 font-w500">Tên sách:</b></label>
                            <input type="text" name="bookname" class="form-control" id="bookname" aria-describedby="bookname" placeholder="Nhập vào tên sách của bạn">
                            <small id="bookname" class="form-text text-muted">* Xin hãy nhập đúng chính tả tên sách của bạn ! </small>
                            <small id="bookname" class="form-text text-muted">* Admin có quyền xóa sách của bạn khi sách có nội dung phản cảm hoặc trái với luật pháp Việt Nam! </small>

                        </div>

                        <div class="form-group">
                            <label for="type_id"><b class="font-3 font-w500">Loại sách:</b></label>
                            <select id="type_id" name="type_id">
                                @foreach($book_type as $type)
                                    <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author"><b class="font-3 font-w500">Tên tác giả:</b></label>
                            <input type="text" name="author" class="form-control" id="author" aria-describedby="author" placeholder="Nhập vào tên tác giả">
                        </div>

                        <div class="form-group">
                            <label for="publisher"><b class="font-3 font-w500">Nhà xuất bản:</b></label>
                            <input type="text" name="publisher" class="form-control" id="publisher" aria-describedby="publisher" placeholder="Nhập vào tên nhà xuất bản">
                        </div>
                        <div class="form-group">
                            <label><b class="font-3 font-w500">Số trang</b></label>
                            <input type="number" name="amount" class="form-control" id="amount" aria-describedby="amount"/>
                        </div>
                        <div class="form-group">
                            <label for="status"><b class="font-3 font-w500">Mô tả:</b></label>
                            <textarea name="status" id="status"></textarea>
                        </div>
                        <div class="d-flex btn--add">
                            <p class="font-3 font-w500 btn--add--p"><button type="submit" class="btn btn-action">Thêm mới</button></p>
                            <p class="font-3 font-w500 btn--add--p"><button type="reset" class="btn btn-action">Làm lại</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
@section('js')
    <script>CKEDITOR.replace('status');</script>
@endsection

