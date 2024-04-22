$(function(){
    $(derecha).click(function(){
        $("option:selected","#select1").appendTo($("#select2"));
        $("#select2 option:selected").prop("selected", false);;
    });
    $(izquierda).click(function(){
        $("#select2 option:selected").appendTo($("#select1"));
        $("#select1 option:selected").prop("selected", false);;
    });
});