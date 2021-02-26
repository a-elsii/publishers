!function($) {
    $(document).ready(function () {
        $('.test').slick({
            nextArrow: '<i class="fa fa-angle-right slick-next" aria-hidden="true"></i>',
            prevArrow: '<i class="fa fa-angle-left slick-prev" aria-hidden="true"></i>',
        });
    }).on('click', '.show_popup', function() {
        $('.popup').modal('show');
    }).on('click', '#popupSignUp', function() {
        let email = $('.popup__emailInput').val();
        checkEmail(email);
    }).on('click', '.block1__link', function() {
        let email = $('.block1__inputEmail').val();
        checkEmail(email);
    }).on('click', '.toggleMenu', function() {
        let email = $('.header').toggleClass('active');
    });

    function checkEmail(email)
    {
        if(!email)
            return toastr.error("Введите email");

        if(!validateEmail(email))
            return toastr.error("Не коректный email");

        $('.popup__emailInput, .block1__inputEmail').val('');

        return toastr.success("Email корректный");
    }
}(jQuery);

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}