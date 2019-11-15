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
        '                <div class="col-md-4 col-lg-3 col-sm-12 pb-4 product ">\n' +
        '                    <div class="card card-cascade narrower card-ecommerce">\n' +
        '                        <!-- Card image -->\n' +
        '                        <div class="view overlay">\n' +
        '                            <img class="mx-auto w-100" src="' + article.imageUrl + '" alt="Card image cap" height="200"> \n' +
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
        '                            <a href="#" class="btn btn-primary" id="article-btn-' + article.id + '">Mettre au panier<\a>\n' +
        '                    </div>\n' +
        '                    <!-- Card -->\n' +
        '                </div>');
}

shopToHTML();

var liste = [
    "Badges",
    "Bandana",
    "Verre Coktail",
    "Bonnet",
    "Casquette",
    "Coque Iphone",
    "Coque Samsung",
    "Dessous de Verre",
    "Gourde",
    "Tasse Inox",
    "Nounours",
    "Sac en tissu",
    "Sac à Corde",
    "Sac en Bandoulière",
    "Tablier",
    "Taie d'Oreiller",
    "Tapis de Souris",
    "Tasse en Verre",
    "Sweat",
    "Pull"
];

$('#recherche').autocomplete({
    source : liste
});


$('#type').click(function (getType) {
    $(".product").forEach(function (e) {
        if (e != 1){
            $('#delete').removeAttribute('hidden');
        }
        else if (categoryId != 2){
            $('#delete').removeAttribute('hidden');
        }
        else if (categoryId != 3) {
            $('#delete').removeAttribute('hidden');
        }
    });

});
