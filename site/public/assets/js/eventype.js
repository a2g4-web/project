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
                    $('.modal-img').append('<img class="img-fluid w-25 mx-1 my-1" src="' + obj.url + '" alt="galery image">');
                }
            }
        }
    });
}

loadEventImage();

$('#addFile').click(function () {
   $('#fileInput').click();
});

$('#fileInput').change(function (e) {
    if(e.target.files.length > 1) {
        alert('Vous ne pouvez pas upload plus d\'1 image à la fois');
    }
    else if(e.target.files[0].name.endsWith('.jpg') || e.target.files[0].name.endsWith('.png')) {
        $('#fileForm').submit();
    }
    else {
        alert('Vous ne pouvez envoyer que des photos');
    }
});

$('#downloadLink').click(function () {
    var url = window.location.href;
    var idStr = url.split('/')[4];
    var id = parseInt(idStr);
    $.ajax({
        url: '/api/downloadlist/' + id,
        type: 'GET',
        complete: function () {
            window.location.href = '/upload/participants.csv';
        }
    });
});

$('#downloadImages').click(function () {
    var url = window.location.href;
    var idStr = url.split('/')[4];
    var id = parseInt(idStr);
    $.ajax({
        url: '/api/downloadimages',
        type: 'GET'
    });
});
