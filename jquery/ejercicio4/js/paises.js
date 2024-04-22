$(function(){
    var paises=$("#paises");
    var continentes = $("#continentes").css({"display":"block","top":"0px","width":"120px","padding-left":"20px"}).change(function(){
        var cod = $(this).val();

        $.getJSON("https://restcountries.com/v3.1/region/"+cod,function(data,status){
            if(status=="success"){
                paises.empty().removeAttr("disabled");
                $.each(data,function(i,v){
                    $("<option>").val(v.cca3).text(v.translations["spa"].common).appendTo(paises);
                })
            }else{
                alert("ERROR");
            }
        });
    });
});