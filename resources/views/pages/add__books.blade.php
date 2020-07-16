@extends('master')
@section('content')
        <div class="container login__index">
            <div class="container login__index--inside">
                <form action="{{route('post_add_books')}}" name='add_books' method="POST" enctype="multipart/form-data" class="form__group">
                    @if (session('message'))
                        <p class="alert alert-success">{{session('message')}}</p>
                    @endif
                    <h2 class="font-3 font-w500">Thêm sách</h2>
                    @csrf
                    <div class="form-group">

                        <div class="form-group">
                            <label for="bookname"><b class="font-3 font-w500">Tên sách:</b></label>
                            <input type="text" name="bookname" class="form-control" id="bookname" aria-describedby="bookname" placeholder="Nhập vào tên sách của bạn">
                            <small id="bookname" class="form-text text-muted">* Xin hãy nhập đúng chính tả tên sách của bạn ! </small>
                            <small id="bookname" class="form-text text-muted">* Admin có quyền xóa sách của bạn khi sách có nội dung phản cảm hoặc trái với luật pháp Việt Nam! </small>

                        </div>

                        <div class="form-group">
                            <label for="type_id"><b class="font-3 font-w500">Loại sách:</b></label>
                            <select id="type_id" name="type_id">
                                <option disabled selected >---Chọn loại sách---</option>
                            @foreach($book_type as $type)
                                    <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author"><b class="font-3 font-w500">Tên tác giả:</b></label>
                            <input type="text" name="author" class="form-control" id="author" aria-describedby="author" required placeholder="Nhập vào tên tác giả">
                        </div>

                        <div class="form-group">
                            <label for="publisher"><b class="font-3 font-w500">Nhà xuất bản:</b></label>
                            <input type="text" name="publisher" class="form-control" id="publisher" aria-describedby="publisher" required placeholder="Nhập vào tên nhà xuất bản">
                        </div>
                        <div class="form-group">
                            <label><b class="font-3 font-w500">Số trang</b></label>
                            <input type="number" name="amount" class="form-control" id="amount" required aria-describedby="amount"/>
                        </div>
                        <label><b class="font-3 font-w500">Ảnh sách:</b></label>
                        <input type="file" accept="image/*" name="book_image">

                        <div class="form-group">
                            <label for="status"><b class="font-3 font-w500">Mô tả:</b></label>
                            <textarea name="status" id="status" required    ></textarea>
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
    <script src="/js/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script>
        $("form[name='add_books']").validate({
            rules: {
                bookname: {
                    required: true,
                },
                author: {
                    required: true,
                },
                type_id: {
                    required: true,
                } ,
                publisher: {
                    required: true,
                },
                amount: {
                    required: true,
                    digits: true
                },
                status: {
                    required:true,
                },
                book_image: {
                    required:true,
                    accept: "image/x-png, image/gif, image/jpg, image/*",
                },
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
                },
                publisher: {
                    required: "* Vui lòng nhập vào tên nhà xuất bản",
                },
                amount: {
                    required: "* Vui lòng nhập số trang của sách",
                    digits: "* Trường này chỉ bao gồm các số"
                },
                book_image: {
                    required: "* Vui lòng thêm ảnh vào",
                    accept: "* Chỉ chấp nhận file dạng ảnh!"
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
            },
        });
    </script>
    <script src="/js/Application.js"></script>
@endsection

