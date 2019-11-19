setInterval(rotate, 3000); // Do the rotate of the carousel every 3 seconds


var carousel = $(".carousel"),
    currdeg  = 0;

function rotate(e){ // Function to rotate the carousel

    currdeg = currdeg - 60;

    carousel.css({
        "-webkit-transform": "rotateY("+currdeg+"deg)",
        "-moz-transform": "rotateY("+currdeg+"deg)",
        "-o-transform": "rotateY("+currdeg+"deg)",
        "transform": "rotateY("+currdeg+"deg)"
    });
}
