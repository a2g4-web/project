var total = 0;

$('.article-price').each(function (e) {
    total += parseInt($(this).text());
});

console.log(total);

$('#totalArticle').html('Total: ' + total + '€');
