$(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('.navbar_section').addClass('sticky_menu');
    } else {
       $('.navbar_section').removeClass('sticky_menu');
    }
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});





$(function() {
  var sig = $('#sig').signature();
  $('#disable').click(function() {
    var disable = $(this).text() === 'Disable';
    $(this).text(disable ? 'Enable' : 'Disable');
    sig.signature(disable ? 'disable' : 'enable');
  });
  $('#clear').click(function() {
    sig.signature('clear');
  });
  $('#json').click(function() {
    alert(sig.signature('toJSON'));
  });
  $('#svg').click(function() {
    alert(sig.signature('toSVG'));
  });
});





