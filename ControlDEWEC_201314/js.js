$(function(){

    $("a[id^=comprar]").click(function(ev){
        ev.preventDefault();
        comprar((this.id).split("_")[1]);
    });

    $("a[id^=detalle]").click(function(ev){
        ev.preventDefault();
        detalle ((this.id).split("_")[1]);
    });

    $("#ver_carrito").click(function(ev){
        //ev.preventDefault();
        //verCarrito();
    });

    function comprar(id){
        $.get("ajax.php?accion=comprar&id="+id,function(data,status){
            $.getJSON("ajax.php?accion=ver_carrito",function(data){
                $("#total_carrito").html(data.total);
            });
        });
    }

    $("img[id^=imagen").draggable({
        revert:true,
        helper:"clone"
    });

    $("#carrito").droppable({
        drop: function(event, ui){
            comprar(ui.draggable[0].id.split("_")[1]);
        }
        
    });

    function detalle(id){
        var plantilla ="";
        $.getJSON("ajax.php?accion=detalle&id="+id,function(data){
            let idProducto=data.id;
            let idProducto2=((data.id<10)?"0":"")+data.id;
            let tituloProducto=data.nombre;
            let precioProducto=data.precio;
            let descripcionProducto=data.descripcion;

            plantilla = `<div class="cuerpo">
            <h2 class="titulo_zona">${tituloProducto}</h2>
            <div class="producto_detalle" id="${idProducto}">
                <div class="info">
                    <div class="titulo_precio">Precio:</div>
                    <div class="precio">${precioProducto} €</div>
                    <a href="index.php?accion=comprar&amp;id=${idProducto}">Comprar</a>
                    <p>${descripcionProducto}</p>
                </div>
                <div class="foto"><img src="index_files/${idProducto2}coc.jpg"></div>
                </div>
                <div class="volver"><a href="index.php">Volver</a></div>
            </div>`;
            
            let ventanaModal = $(plantilla).dialog(
                {
                    modal:true,
                    width:550,
                    close: function(){
                        ventanaModal.remove();
                    }
                }
            );

            ventanaModal.find(".volver").click(function(ev){
                ev.preventDefault();
                ventanaModal.remove();
            });

            ventanaModal.find("a:first").click(function(ev){
                ev.preventDefault();
                comprar(this.href.split("id=")[1]);
            });
        });
        
    }

    function verCarrito(){
        alert("Ver carrito");
    }
});