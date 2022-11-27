$(document).ready(function(){      
    var param = window.location.search

    if(param.search('msj=') != -1){
        var msg = parseInt(param.match(/\d+/)[0])
        showCustomAlert(msg)
    } else if(param.search('logout=') != -1){
        showCustomAlert(7)
    }

})

function showCustomAlert(index){
    switch(index){
        case 1: 
            successAlert('Éxito', 'Se ha guardado exitosamente');
        break;
        case 2: 
            warningAlert('Alerta','Algo salió mal...')
        break;
        case 3:
            successAlert('Éxito','Se ha editado exitosamente') 
        break;
        case 4:
            warningAlert('Alerta','Algo salió mal...') 
        break;
        case 5:
            warningAlert('Alerta','Las contraseñas no coinciden...') 
        break;
        case 6:
            successAlert('Éxito','Se ha eliminado exitosamente') 
        break;
        case 7:
            successAlert('Sesión','Se ha cerrado la sesión') 
        break;
        case 9:
            warningAlert('Sesión','Inicio de sesión fallido, la contraseña y nombre de usuarios no existen.') 
        break;
        case 8:
            warningAlert('Sesión','Los campos están vaciós.') 
        break;
    }
}   
