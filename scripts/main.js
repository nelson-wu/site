var main = function(){
    var slideout = function(){
        $(this)
            .stop(true, false) 
            .animate({
            left: '0'
        }, {
            duration: 300
        });
        
        $('.contentdiv')
            .stop(true, false)
            .animate({
                margin: "100px 240px 100px 400px",
            }, {
                duration: 400
            });
    };
    var slidein = function(){
        $(this)
            .stop(true, false)
            .animate({
            left: '-220px'
        }, {
            duration: 300
        });
        $('.contentdiv')
            .stop(true, false)
            .animate({
                margin: "100px 320px"
            }, {
                duration: 400

            });
    };
   // $('.navdiv').hover(slideout, slidein);
}

$(document).ready(main);
