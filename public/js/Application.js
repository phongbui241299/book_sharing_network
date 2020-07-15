(function($){
    $(window).scroll(function () {
        const scroll_component = $(window).scrollTop();
        if(scroll_component > 150){
            $('.add_class').addClass('scroll__active');
        }else{
            $('.add_class').removeClass('scroll__active');
        }
    });

    $('.fa-search').click(function () {
        $(".overlay__search").toggleClass("active_search");
    });

    $('.fa-bars').click(function () {
        // $('.right__sidebars').addClass('bar__content');
        $('.bar__content').addClass('active_bar');
        $('.overlay').addClass('active_overlay');
    });

    $('.overlay').click(function () {
        $('.bar__content').removeClass('active_bar');
        $('.overlay').removeClass('active_overlay');
    });

    $('.fa-window-close ').click(function () {
        $('.bar__content').removeClass('active_bar');
        $('.overlay').removeClass('active_overlay');
    })
    $('#search-content').css('display','none');
    $('#search_value').keyup(function () {
        let search_vl = $('#search_value').val().toLowerCase().trim();
        $.get('/filter?data='+search_vl, function (data) {
            // console.log(data);
            $('#search-content').empty();
            $.each(data, function (key,value) {
                $('#search-content').append(`<a href="/books_detail/${value.books_id}"><img src="/${value.image}" width="30px" height="40px"></img>${value.book_name}</a><br>`);
            })
            // <img src="/{{$value_search->image}}" alt="" width="240px" height="280px">

            if($('#search_value').val() === ''){
                // console.log(value);
                $('#search-content').css('display','none');
            }else{
                $('#search-content').css('display','block');
            }
        })
    })

        $('#re_password').on('keyup', function () {
            let password = $('#password').val();
            let re_password = $('#re_password').val();
            if (re_password === password) {
                $('#success_pass').html('Khớp mật khẩu');
                $('#success_pass').removeClass('text-danger');
                $('#success_pass').addClass('text-success');
            } else {
                $('#success_pass').html('Không khớp mật khẩu');
                $('#success_pass').removeClass('text-success');
                $('#success_pass').addClass('text-danger');
            }
        });


// get api city for sign_up
    $('#city').change(function () {
        let city_vl = $(this).val();
        $('#district').empty();
        $.get('/city?city='+city_vl, function (data) {
            // console.log(data);
            $.each(data, function (key,value) {
                $('#district').append(`<option value="${value.maqh}">${value.district_name}</option>`);

            })
            $('#district').change(function (){
                let district_vl = $(this).val();
                $('#ward').empty();
                $.get('/district?district='+district_vl, function (district_data) {
                    // console.log(district_data);
                $.each(district_data, function (key,value) {
                    $('#ward').append(`<option value="${value.id}">${value.ward_name}</option>`);
                    })
                })
            })
        })
    })
// get api city for edit_profile
    $('#district_edit').empty();

    $('#city_edit').change(function () {
        let city_vl = $(this).val();
        $.get('/city?city='+city_vl, function (data) {
            // console.log(data);
            $.each(data, function (key,value) {
                $('#district_edit').append(`<option value="${value.maqh}">${value.district_name}</option>`);

            })
            $('#district_edit').change(function (){
                let district_vl = $(this).val();
                $('#ward_edit').empty();
                $.get('/district?district='+district_vl, function (district_data) {
                    // console.log(district_data);
                    $.each(district_data, function (key,value) {
                        $('#ward_edit').append(`<option value="${value.id}">${value.ward_name}</option>`);
                    })
                })
            })
        })
    })
    $('.pagination a').unbind('click').on('click', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
    })

    $('.intro__slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        infinite: true,
        dots:true,
        autoplay: true,
        prevArrow:'<div class="btn__prev-next prev__custom"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',
        nextArrow:'<div class="btn__prev-next next__custom"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',
        autoplaySpeed: 2000,
    })
    // Preloader
    $(window).on('load', function () {
        if ($('#preloader').length) {
            $('#preloader').delay(100).fadeOut('slow', function () {
                $(this).remove();
            });
        }
    });

})(jQuery);
//--js--
function warning__borrow(){
    alert("Vui lòng đăng nhập để tiếp tục mượn sách");
    location.replace('/account/login');
}

