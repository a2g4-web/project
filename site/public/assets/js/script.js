/*$('.carousel').carousel({
    interval: 3000
});*/


if($(document).width() < 768) {
    $('.dropdown-menu-right').removeClass('dropdown-menu-right');
}

$('#modalCookies').modal('show'); // Show rhe window to ask to accept the cookies

$('#showModal').click(function () {
    console.log('click');
    $('#categoryModal').modal('show');
});

$.ajax({
    url: 'http://minecloud.fr:8001/api/categories',
    type: 'GET',
    dataType: 'json',
    success: function (json) {
        json.forEach(function (item) {
            $('#dropdownCategory').prepend('<a class="dropdown-item" id="type" href="/shop/' + item.name + '">' + item.name + '</a>');
        });
    }
});
