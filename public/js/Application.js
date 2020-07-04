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

    // $('#search_value').keyup(function () {
    //     let search_vl = $('#search_value').val().toLowerCase().trim();
    //     $.get('/search?search_vl='+search_vl, function (data) {
    //         $.each(data, function (key,value) {
    //             $('.search-content').empty();
    //              $('.search-content').append(`<p>${value.book_name}</p>`);
    //         })
    //     })
    // })
    //

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
const provinces = document.getElementById("provinces");
let provincesList =
    ['Thành phố Hà Nội',
              'Tỉnh Hà Giang',
               'Tỉnh Cao Bằng',
               'Tỉnh Bắc Kạn',
               'Tỉnh Tuyên Quang',
               'Tỉnh Lào Cai',
               'Tỉnh Điện Biên',
               'Tỉnh Lai Châu',
               'Tỉnh Sơn La',
               'Tỉnh Yên Bái',
               'Tỉnh Hoà Bình',
               'Tỉnh Thái Nguyên',
               'Tỉnh Lạng Sơn',
               'Tỉnh Quảng Ninh',
               'Tỉnh Bắc Giang',
               'Tỉnh Phú Thọ',
               'Tỉnh Vĩnh Phúc',
               'Tỉnh Bắc Ninh',
               'Tỉnh Hải Dương',
               'Thành phố Hải Phòng',
               'Tỉnh Hưng Yên',
               'Tỉnh Thái Bình',
               'Tỉnh Hà Nam',
               'Tỉnh Nam Định',
               'Tỉnh Ninh Bình',
               'Tỉnh Thanh Hóa',
               'Tỉnh Nghệ An',
               'Tỉnh Hà Tĩnh',
               'Tỉnh Quảng Bình',
               'Tỉnh Quảng Trị',
               'Tỉnh Thừa Thiên Huế',
               'Thành phố Đà Nẵng',
               'Tỉnh Quảng Nam',
               'Tỉnh Quảng Ngãi',
               'Tỉnh Bình Định',
               'Tỉnh Phú Yên',
               'Tỉnh Khánh Hòa',
               'Tỉnh Ninh Thuận',
               'Tỉnh Bình Thuận',
               'Tỉnh Kon Tum',
               'Tỉnh Gia Lai',
               'Tỉnh Đắk Lắk',
               'Tỉnh Đắk Nông',
               'Tỉnh Lâm Đồng',
               'Tỉnh Bình Phước',
               'Tỉnh Tây Ninh',
               'Tỉnh Bình Dương',
               'Tỉnh Đồng Nai',
               'Tỉnh Bà Rịa - Vũng Tàu',
               'Thành phố Hồ Chí Minh',
               'Tỉnh Long An',
               'Tỉnh Tiền Giang',
               'Tỉnh Bến Tre',
               'Tỉnh Trà Vinh',
               'Tỉnh Vĩnh Long',
               'Tỉnh Đồng Tháp',
               'Tỉnh An Giang',
               'Tỉnh Kiên Giang',
               'Thành phố Cần Thơ',
               'Tỉnh Hậu Giang',
               'Tỉnh Sóc Trăng',
               'Tỉnh Bạc Liêu',
               'Tỉnh Cà Mau'];
provinces.innerHTML = provincesList.map(
    (item)=> `<option value="${item}">${item}</option>`
);



