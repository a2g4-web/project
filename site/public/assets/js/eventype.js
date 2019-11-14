function loadEventImage() {
    $.ajax({
        url: 'http://minecloud.fr:8001/api/images',
        dataType: 'json',
        type: 'GET',
        success: function (json) {
            var url = window.location.href;
            var idStr = url.split('/')[4];
            var id = parseInt(idStr);
            for(var obj of json) {
                if(obj.eventId === id) {
                    $('.event-header').prepend('<img class="w-100" src="' + obj.url + '" alt="event image">');
                    break;
                }
            }
            for(obj of json) {
                if(obj.eventId === id) {
                    $('.modal-body').append('<img class="img-fluid" width="300" src="' + obj.url + '" alt="galery image">');
                }
            }
        }
    });
}

loadEventImage();
