/*$('.carousel').carousel({
    interval: 3000
});*/


if($(document).width() < 768) {
    $('.dropdown-menu-right').removeClass('dropdown-menu-right');
}

$('#modalCookies').modal('show');

$('#showModal').click(function () {
    console.log('click');
    $('#categoryModal').modal('show');
});
