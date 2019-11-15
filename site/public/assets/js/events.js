var eventToHTML = function () {
    $.ajax({
        url: 'http://minecloud.fr:8001/api/events',
        type: 'GET',
        dataType: 'json',
        success: function (json, statut) {
            json.forEach(function (obj) {
                writeEvent(obj);
            });
        },
        error: function (resultat, statut) {
            console.log(resultat + ': ' + statut);
        }
    });
};

function writeEvent(event) {
    var select = $('.events');
    select.html(select.html() + '<div class="col-md-5 mx-auto pb-4">\n' +
        '                <div class="card">\n' +
        '\n' +
        '                    <!-- Card image -->\n' +
        '                    <div class="view overlay">\n' +
        '                        <img class="mx-auto w-100" src="' + event.images[0].url + '" alt="Card image cap" height="350">\n' +
        '                        <a href="/events/' + event.id + '">\n' +
        '                            <div class="mask rgba-white-slight"></div>\n' +
        '                        </a>\n' +
        '                    </div>\n' +
        '\n' +
        '                    <!-- Card content -->\n' +
        '                    <div class="card-body">\n' +
        '\n' +
        '                        <!-- Title -->\n' +
        '                        <h4 class="card-title">' + event.name + '</h4>\n' +
        '                        <!-- Text -->\n' +
        '                        <p class="card-text">' + event.description + '</p>\n' +
        '                        <!-- Button -->\n' +
        '                        <a href="/events/' + event.id + '" class="btn btn-primary">Voir</a>\n' +
        '                        <p class="float-right mt-3"><a href="/events/' + event.id + '" class="text-dark"><i class="fas fa-comments fa-2x"></i></a> <a href="#" class="text-dark"><i class="far fa-heart fa-2x"></i></a> ' + getEuro(event.price) + '</p>' +
        '\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>\n' +
        '                <!-- Card -->\n' +
        '            </div>');
}

var getEuro = function(price) {
    if(price === 0) return '<i class="fab fa-creative-commons-nc-eu fa-2x"></i>';
    return '<i class="fas fa-euro-sign fa-2x"></i>';
};

eventToHTML();
