$(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('.navbar_section').addClass('sticky_menu');
    } else {
       $('.navbar_section').removeClass('sticky_menu');
    }
});