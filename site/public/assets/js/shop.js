String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

function compare(a, b) {
    return a['price'] - b['price'];
}

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
        '                <div class="col-md-4 col-lg-3 col-sm-12 pb-4 product-' + article.name.replaceAll(' ', '').replaceAll('\'', '') + '">\n' +
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
        '                            <h4 class="card-title card-name">' + article.name +' <\h4>\n' +
        '\n' +
        '                            <!-- Description -->\n' +
        '                            <p class="card-text">' + article.description +'<\p>\n' +
        '                            <!-- button --> \n'+
        '                            <p class="card-price">' + article.price +'€</p>\n' +
        '                            <a href="/api/addtobasket/' + article.id + '" class="btn btn-primary" id="article-btn-' + article.id + '">Mettre au panier<\a>\n' +
        '                    </div>\n' +
        '                    <!-- Card -->\n' +
        '                </div>');
}

console.log($('.articles').text());

if($('.articles').text().replaceAll('\n', '').replaceAll(' ', '') === '') {
    shopToHTML();
}

function sortByPrice() {
    $('.articles').html('');
    $.ajax({
        url: 'http://minecloud.fr:8001/api/articles',
        type: 'GET',
        dataType: 'json',
        success: function (json, statut) {
            json.sort(compare);
            json.forEach(function (obj) {
                writeArticle(obj);
            });
        },
        error: function (resultat, statut) {
            console.log(resultat + ': ' + statut);
        }
    });
}

var liste = [];

$.ajax({
   url: 'http://minecloud.fr:8001/api/articles',
   type: 'GET',
   dataType: 'json',
   success: function (json) {
       json.forEach(function (e) {
          liste.push(e.name);
       });
       $('#recherche').autocomplete({
           source : liste
       });
   }
});

$('#recherche-link').click(function () {
    $('.card-name').each(function (e) {
        var name = $(this).text();
        if($('#recherche').val() === '') {
            $('.product-' + name.replaceAll(' ', '').replaceAll('\'', '')).show();
        }
        else if(name.replaceAll(' ', '') !== $('#recherche').val().replaceAll(' ', ''))
        {
            console.log(name.replaceAll(' ', ''));
            $('.product-' + name.replaceAll(' ', '').replaceAll('\'', '')).hide();
        }
        else {
            $('.product-' + name.replaceAll(' ', '').replaceAll('\'', '')).show();
        }
    });
});

$('#formSend').click(function () {
    $('#articleForm').submit();
});

$('#addFile').click(function () {
    $('#fileInput').click();
});

$('#fileInput').change(function (e) {
    if(e.target.files.length > 1) {
        alert('Vous ne pouvez pas upload plus d\'1 image à la fois');
    }
    else if(e.target.files[0].name.endsWith('.jpg') || e.target.files[0].name.endsWith('.png')) {
        $('#fileName').text(e.target.files[0].name);
    }
    else {
        alert('Vous ne pouvez envoyer que des photos');
    }
});

$('#formSends').click(function () {
    $('#categoryForm').submit();
});

$.ajax({
    url: 'http://minecloud.fr:8001/api/categories',
    type: 'GET',
    dataType: 'json',
    success: function (json) {
        json.forEach(function (item) {
            $('#categoryId').append('<option value="' + item.id + '">' + item.name + '</option>');
        });
    }
});

function sortByBest() {
    var a = new Map();
    $.ajax({
        url: 'http://minecloud.fr:8001/api/bought',
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            json.forEach(function (item) {
                if(a.has(item.articleId)) {
                    a.set(item.articleId, a.get(item.articleId)+1);
                }
                else {
                    a.set(item.articleId, 1);
                }
            });
            a[Symbol.iterator] = function* () {
                yield*[...this.entries()].sort((a, b) => b[1] - a[1]);
            };
            for(var i = 0; i < 3; i++) {
                console.log([...a][i]);
            }
            
        }
    });
}
