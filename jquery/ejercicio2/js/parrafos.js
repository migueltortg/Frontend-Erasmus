$(function(){
    $("p").click(function(ev){
        if(ev.ctrlKey){
            $(this).prev().before($(this));
        }else{
            $(this).before($(this).next());
        }
    });

});