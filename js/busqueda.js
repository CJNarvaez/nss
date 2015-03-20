$(document).ready(function(){
    $('#buscando').toggle();
});
//MANDA LOS DATOS PARA LA BUSQUEDA
function buscar()
{
    //SI NO SE HA PUESTO NINGUN VALOR EN EL FORMULARIO
    if($('#curp').val() == '' && $('#paterno').val() == '' && $('#materno').val() == '' && $('#nombre').val() == '')
        alert('Debes introducir al menos un valor')
    
    //SI HAY DATOS Y ENVIA LOS DATOS POR METODO POST AL CONTROLADOR
    else
    {
        $("#btn_buscar").toggle();
        $('#buscando').toggle();
        $('#resultado').load('/nss/index.php/busqueda/buscar/',{ curp: $('#curp').val() , paterno: $('#paterno').val() , materno: $('#materno').val() , nombre: $('#nombre').val() });
    }
        
}