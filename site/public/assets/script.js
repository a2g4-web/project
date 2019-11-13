$('.carousel').carousel({
    interval: 3000
});

if($(document).width() < 768) {
    $('.dropdown-menu-right').removeClass('dropdown-menu-right');
}

var eventToHTML = function () {
    $.ajax({
        url: 'http://localhost:8001/api/events',
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
    select.html(select.html() + '<div class="col-md-4 mx-auto">\n' +
        '                <div class="card h-100">\n' +
        '\n' +
        '                    <!-- Card image -->\n' +
        '                    <div class="view overlay">\n' +
        '                        <img class="px-auto" src="' + event.images[0].url + '" alt="Card image cap" height="234" width="auto">\n' +
        '                        <a href="#!">\n' +
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
        '                        <a href="#" class="btn btn-primary">Button</a>\n' +
        '                        <p class="float-right mt-3">' + getEuro(event.price) + '</p>' +
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

var shopToHTML = function () {
    $.ajax({
        url: 'http://localhost:8001/api/articles',
        type: 'GET',
        dataType: 'json',
        success: function (json, statut) {
            json.forEach(function (obj) {
                writeArticle(obj);
            });
        },
        error: function (resultat, statut) {
            console.log(resultat + ': ' + statut);
        }
    });
};

function writeArticle(article) {
    var select = $('.articles');
    select.html(select.html() + '<div class="container my-4">\n +'
}


