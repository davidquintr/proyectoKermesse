$(document).ready(function(){      
    var param = window.location.search

    if(param.search('msj=') != -1){
        var msg = parseInt(param.match(/\d+/)[0])
        showCustomAlert(msg)
    }

})

function showCustomAlert(index){

    if(index == 1)
        successAlert('Éxito', 'Se ha guardado exitosamente');
    else if(index == 2 || index == 4)
        warningAlert('Alerta','Algo salió mal...')
    else if(index == 3)
        successAlert('Éxito','Se ha editado exitosamente')
    else if(index == 5)
        warningAlert('Alerta','Las contraseñas no coinciden...')
    else if(index == 3)
        successAlert('Éxito','Se ha eliminado exitosamente')
}   
