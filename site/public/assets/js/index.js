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
