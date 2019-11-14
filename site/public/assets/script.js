/*$('.carousel').carousel({
    interval: 3000
});*/


if($(document).width() < 768) {
    $('.dropdown-menu-right').removeClass('dropdown-menu-right');
}

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
        '                        <img class="px-auto" src="' + event.images[0].url + '" alt="Card image cap" height="350">\n' +
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
        '                        <a href="#" class="btn btn-primary">Button</a>\n' +
        '                        <p class="float-right mt-3"><a href="#" class="text-dark"><i class="fas fa-comments fa-2x"></i></a> <a href="#" class="text-dark"><i class="far fa-heart fa-2x"></i></a> ' + getEuro(event.price) + '</p>' +
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
        url: 'http://minecloud.fr:8001/api/articles',
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
    select.html(select.html() +
        '                <div class="col-md-4 col-lg-3 col-sm-12 pb-4">\n' +
        '                    <div class="card card-cascade narrower card-ecommerce">\n' +
        '                        <!-- Card image -->\n' +
        '                        <div class="view view-cascade overlay">\n' +
        '                            <img class="px-auto" src="' + article.imageUrl + '" alt="Card image cap" height="350"> \n' +
        '                            <a href="#!">\n' +
        '                                <div class="mask rgba-white-slight"></div>\n' +
        '                            </a>\n' +
        '                        </div>\n' +
        '                        <!-- Card image -->\n' +
        '                        <!-- Card content -->\n' +
        '                        <div class="card-body card-body-cascade text-center">\n' +
        '                            <!-- Category & Title -->\n' +
        '\n' +
        '                            <h4 class="card-title">' + article.name +' <\h4>\n' +
        '\n' +
        '                            <!-- Description -->\n' +
        '                            <p class="card-text">' + article.description +'<\p>\n' +
        '                            <!-- button --> \n'+
        '                            <p class="card-price">' + article.price +'€</p>\n' +
        '                            <a href="#" class="btn btn-primary"> Mettre au panier<\a>\n' +
        '                    </div>\n' +
        '                    <!-- Card -->\n' +
        '                </div>');
}

shopToHTML();

var liste = [
    "Draggable",
    "Droppable",
    "Resizable",
    "Selectable",
    "Sortable",
    "Mathis"
];

$('#recherche').autocomplete({
    source : liste
});


setInterval(rotate, 3000);


var carousel = $(".carousel"),
    currdeg  = 0;

function rotate(e){

        currdeg = currdeg - 60;

    carousel.css({
        "-webkit-transform": "rotateY("+currdeg+"deg)",
        "-moz-transform": "rotateY("+currdeg+"deg)",
        "-o-transform": "rotateY("+currdeg+"deg)",
        "transform": "rotateY("+currdeg+"deg)"
    });
}

$("#ModalWarning").on('hidden.bs.modal', function(){
    alert("Hello World!");
});
