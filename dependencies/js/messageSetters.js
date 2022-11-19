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
    else if(index == 2)
        warningAlert('Alerta','Algo salió mal...')
    else if(index == 3)
        errorAlert('Error','Algo salió fatal, matate mi loco')


} 
