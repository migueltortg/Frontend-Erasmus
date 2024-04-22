var espacio=0;
var numEspacios=0;
$(function(){
    $("button").click(function(){
        $("ul").remove();
        $("<ul>").attr('id','lista').appendTo($("body"));
        var array= $("textarea").val().split("\n");
        for(var i=0;i<array.length;i++){
            
                $("<li>").text(array[i]).appendTo($('#lista'));
            
        }
    });
});