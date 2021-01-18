$(document).ready(function(){
    $('.comprar').on('click', function(){

        $.ajax({
             url: "realizarCompra.php",
            method: "POST",
            dataType: "JSON", success: function(resp) {
					if(resp.state == 1){
						alert('Se ha realizado la compra, Muchas gracias!');
					}
					if(resp.state == 2){
						alert('Error, la cantidad seleccionada excede a la cantidad del stock');
                    }
					if(resp.state == 3){
						alert('No hay ningún producto en el carrito');
                    }
					if(resp.state == 4){
						alert('No estas registrado');
					}
                }
        });   
    });  
});