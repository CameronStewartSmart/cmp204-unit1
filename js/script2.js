$(function(){
    var i = 0;
    $(".divThree").mouseenter(function(){
        $(".jumbotron").css("transform", "scale(1.5)");
    });
    
    $(".divThree").mouseleave(function(){
        $(".jumbotron").css("transform", "scale(1.0)");
    });
});

