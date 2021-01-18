$(document).ready(function () {
    $('#formComentario').on('submit', function (event) {
        event.preventDefault();
        var datosForm = $(this).serialize();
        $.ajax({
            url:"comentario.php",
            method:"POST",
            data:datosForm,
            dataType:"JSON",
            success:function (data) {
                if (data.error != '') {
                    $('#formComentario')[0].reset();
                    $('#idComentario').val("0");
                    $('#leyenda').text("Comentario");
                    $('#mensajeComentario').html(data.error);
                    cargarComentario();
                }
            },
        })
    });
});

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}

function getUrlParam(parameter, defaultvalue){
    var urlparameter = defaultvalue;
    if(window.location.href.indexOf(parameter) > -1){
        urlparameter = getUrlVars()[parameter];
        }
    return urlparameter;
}

// @ts-check
function cargarComentario() {
    var id = getUrlParam('id', '0');
    var accion = 'buscarComentario';
    var prueba = {idproducto : id, accionComentario : accion };
    //alert(typeof(prueba));
    $.ajax({
        url:"comentario.php",
        method:"POST",
        data: prueba,
        //dataType:"JSON",
        success:function (data) {
            $('#mostrarComentario').html(data);
        }
    })
    
}

$(document).on('click', '.responder', function () {
    var idComentario = $(this).attr("id");
    $('#idComentario').val(idComentario);
    $('#leyenda').text("Respuesta");
    $('#texto').focus();
})

$(function() {
    $('.rate input').on('click', function(){
        var ratingNum = $(this).val();

        $.ajax({
             url: "valoracion.php",
            method: "POST",
            dataType: "JSON",
            data: { 
                ratingNum: ratingNum
                }, success: function(resp) {
                if(resp.status == 1){
                    alert('Gracias! Has valorado '+ratingNum+'');
                }
                if(resp.status == 2){
                    alert('Su valoración se ha cambiado a '+ratingNum+'');
                }
                if(resp.status == 3){
                    alert('No estás registrado, no puedes valorar');
                }
                }
        });   
    });
});

//script del carrito

$(document).ready(function(){
    $('.decrementar').on('click', function(){
        //Solo si el valor del campo es diferente de 0
        if ($('#cantidad').val() != 0)
            //Decrementamos su valor
            $('#cantidad').val(parseInt($('#cantidad').val()) - 1);
    });

    $('.incrementar').on('click', function(){
        //Aumentamos el valor del campo
        $('#cantidad').val(parseInt($('#cantidad').val()) + 1);
    });

    $('#addCarro').on('click', function(){
        var usuario = $('#usuario').val();
		var producto = $('#idProducto').val();
		var cantidad = $('#cantidad').val();

        $.ajax({
             url: "addcarrito.php",
            method: "POST",
            dataType: "JSON",
            data: { 
                usuario: usuario,
				producto: producto,
				cantidad: cantidad
                }, success: function(resp) {
					if(resp.state == 1){
						alert('Producto añadido al carro');
					}
					if(resp.state == 2){
						alert('Carro actualizado');
					}
                }
        });   
    });  
});

//eliminar del carrito

$(document).ready(function(){

    $('.delCarro').on('click', function(){
		var producto =  $(this).attr('name');

        $.ajax({
             url: "delCarro.php",
            method: "POST",
            dataType: "JSON",
            data: { 
				producto: producto
                }, success: function(resp) {
					alert('Producto eliminado del carro');					
                }
        });   
    });  
});