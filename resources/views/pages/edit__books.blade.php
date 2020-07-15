@extends('master')
@section('content')
    <div class="container login__index">
        <div class="container login__index--inside">
            <form action="{{route('post_edit_books',request()->route('id'))}}" method="POST" name="add_books" enctype="multipart/form-data" class="form__group">
                    @if(session('mess_update'))
                        <p class="alert alert-success">{{session('mess_update')}}</p>
                    @endif
                <h2 class="font-3 font-w500">Chỉnh sửa thông tin sách</h2>
                @csrf
                    @foreach($book as $books)

                        <div class="form-group">
                        <label><b class="font-3 font-w500">Ảnh sách:</b></label>
                        <input type="file" name="book_image" required>

                        <div class="form-group">
                            <label for="bookname"><b class="font-3 font-w500">Tên sách:</b></label>
                            <input type="text" name="book_name" class="form-control" value="{{$books->book_name}}" id="book_name" aria-describedby="book_name" placeholder="Nhập vào tên sách của bạn" required>
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
                            <input type="text" name="author" class="form-control" value="{{$books->author}}" id="author" aria-describedby="author" required placeholder="Nhập vào tên tác giả">
                        </div>

                        <div class="form-group">
                            <label for="publisher"><b class="font-3 font-w500">Nhà xuất bản:</b></label>
                            <input type="text" name="publisher" class="form-control" id="publisher" value="{{$books->publisher}}" aria-describedby="publisher" required placeholder="Nhập vào tên nhà xuất bản">
                        </div>
                        <div class="form-group">
                            <label><b class="font-3 font-w500">Số trang</b></label>
                            <input type="number" name="amount" class="form-control" id="amount" value="{{$books->amount}}" required aria-describedby="amount"/>
                        </div>
                        <div class="form-group">
                            <label for="status"><b class="font-3 font-w500">Mô tả:</b></label>
                            <textarea name="status" id="status" required value="{{$books->status}}"></textarea>
                        </div>
                        <div class="d-flex btn--add">
                            <p class="font-3 font-w500 btn--add--p"><button type="submit" class="btn btn-action">Cập nhật</button></p>
                        </div>
                    </div>
                        @endforeach
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('status');
    </script>
    <script src="/js/jquery.validate.min.js"></script>
    <script>
        $("form[name='add_books']").validate({
            rules: {
                bookname: {
                    required: true,
                },
                author: {
                    required: true,
                },
                type_id:{
                    required: true,
                } ,
                publisher:{
                    required: true,
                },
                amount:{
                    required: true,
                },
                book_image:{
                    required:true,
                },
                status:{
                    required:true,
                }

            },
            messages: {
                bookname: {
                    required: "* Vui lòng nhập vào tên sách",
                },
                author: {
                    required: "* Vui lòng nhập tên tác giả",
                },
                type_id: {
                    required: "* Vui lòng chọn loại sách",
                }
                ,
                publisher: {
                    required: "* Vui lòng nhập vào tên nhà xuất bản",
                },
                amount:{
                    required: "* Vui lòng nhập số trang của sách",
                },
                book_image: {
                    required: "* Trường ảnh không được để trống",
                },
                status:{
                    required: "* Vui lòng nhập vào mô tả sách",
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



