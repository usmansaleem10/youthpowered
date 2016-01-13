function fx_left() {
    var wd = $(window).width();
    if (wd < 767) {
        $(".left").removeClass("leftfix");
    }
    if (wd > 767) {
        $(".left").addClass("leftfix");
    }
}


function ox() {

    $(".plus_button").each(function () {
        $(this).click(function () {

            $(this).find("span").toggleClass("fa-minus");
            $(this).parent("div").parent("div").find(".subsmall").toggle();

            return false;
        });
    });
}

function gear_sub(){
    $(".gear_block").each(function(){
       $(this).find("a").click(function(){    
           $(".gear_block").find(".setting_sub").toggle();
       }) ;
    });
}

function message_open(){
    $("#p1").click(function(){        
    $(".message_user").hide();
       $("#p_1").show();
       return false;
    });
    $("#p2").click(function(){        
    $(".message_user").hide();
       $("#p_2").show();
       return false;
    });
    $("#p3").click(function(){        
    $(".message_user").hide();
       $("#p_3").show();
       return false;
    });
    $("#p4").click(function(){        
    $(".message_user").hide();
       $("#p_4").show();
       return false;
    });
    $("#p5").click(function(){        
    $(".message_user").hide();
       $("#p_5").show();
       return false;
    });
    $("#p6").click(function(){        
    $(".message_user").hide();
       $("#p_6").show();
       return false;
    });
    $("#p7").click(function(){        
    $(".message_user").hide();
       $("#p_7").show();
       return false;
    });

}




$(document).ready(function () {

    fx_left();
    ox();
    message_open();
    gear_sub();
});

$(window).resize(function () {
    fx_left();
    ox();
    message_open();
    gear_sub();
    
});