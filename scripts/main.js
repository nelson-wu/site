var main = function(){
    var slideout = function(){
        $(this)
            .stop(true, false) 
            .animate({
            left: '0'
        }, {
            duration: 300
        });
    };
    var slidein = function(){
        $(this)
            .stop(true, false)
            .animate({
            left: '-230px'
        }, {
            duration: 300
        });
    };
    $('.navdiv').hover(slideout, slidein);
}

$(document).ready(main);
