var total = 0;

$('.article-price').each(function (e) {
    total += parseInt($(this).text());
});

console.log(total);

$('#totalArticle').html('Total: ' + total + '€'); // Function to calcul the total price of the basket

