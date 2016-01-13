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

function gear_sub() {
    $(".gear_block").each(function () {
        $(this).find("a").click(function () {
            $(".gear_block").find(".setting_sub").toggle();
        });
    });


}

function message_open() {
    $("#p1").click(function () {
        $(".message_user").hide();
        $("#p_1").show();
        return false;
    });
    $("#p2").click(function () {
        $(".message_user").hide();
        $("#p_2").show();
        return false;
    });
    $("#p3").click(function () {
        $(".message_user").hide();
        $("#p_3").show();
        return false;
    });
    $("#p4").click(function () {
        $(".message_user").hide();
        $("#p_4").show();
        return false;
    });
    $("#p5").click(function () {
        $(".message_user").hide();
        $("#p_5").show();
        return false;
    });
    $("#p6").click(function () {
        $(".message_user").hide();
        $("#p_6").show();
        return false;
    });
    $("#p7").click(function () {
        $(".message_user").hide();
        $("#p_7").show();
        return false;
    });

}

function people_add(){
    $(".add_people").each(function () {
        $(this).click(function () {
            $(this).parent().parent().parent("div").find(".people_add").show();
           $(this).parent().parent().hide();
           
               return false;
        });
    
    });
    $(".close_button").click(function(){       
       $(".pp").show();
       $(".people_add").hide();
       return false;
    });
    
}

function more_button(){
         $(".more_button").click(function(){
             $(".more_options").toggle();     
             return false;
         });
}

function add_fr(){
    $(".more_fr").click(function(){
       $(".add_fr_box").show();
        
       return false;
    });
    $(".add_fr_box a").click(function(){
          $(this).parent().hide();
          return false;
    });
    
}

function task1(){
    var wd = $(window).width();
    if(wd > 965 ){
    $(".task").click(function(){
       $(this).addClass("side-open") ;
       $(".sd-tasks").addClass("sd-right");
        return false;
    });
    $(".clbutton").click(function(){
       $(".task").removeClass("side-open");
       return false;
    });
}
if(wd < 965){
    $(".task").click(function(){
     $(this).hide();
     $(".sd-tasks").show();
     $(".sd-tasks").addClass("rrelative");
     return false;
    });
    
    $(".clbutton").click(function(){
       $(".sd-tasks").hide();
       $(".task").show();
       return false;
    });
}
 $(".nolink1").click(function(){
    return false; 
 });
}


function pr_status(){
    
    $(".project-status").click(function(){
        $(this).find(".fa").toggleClass("fa-close");
        $(this).find(".fa").toggleClass("color-red");
        return false;
    });
}




$(document).ready(function () {

    fx_left();
    ox();
    message_open();
    gear_sub();
    people_add();
        more_button();
add_fr();
    task1();
    pr_status();

  
});

$(window).resize(function () {
    fx_left();
    ox();
    message_open();
    gear_sub();
task1();

});