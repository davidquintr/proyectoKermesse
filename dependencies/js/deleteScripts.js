
function deleteObject(idObj, option){
    confirm(function(e,btn){
        e.preventDefault();

        switch(option){
            case '1':
                window.location.href = "../../negocio/Ng_tbl_usuario.php?delU="+idObj;
            break;
            case '2':
                window.location.href = "../../negocio/Ng_tbl_rolOpcion.php?delOp="+idObj;
            break;
            case '3':
                window.location.href = "../../negocio/Ng_tbl_rol.php?delRo="+idObj;
            break;
            case '4':
                window.location.href = "../../negocio/Ng_rol_usuario.php?delRu="+idObj;
            break;
<<<<<<< HEAD
            case 'listprod':
                window.location.href = "../../negocio/Ng_tbl_listaPrecios.php?delList="+idObj;
            break;
            case 'prod':
                window.location.href = "../../negocio/Ng_tbl_listaPrecios.php?delprod="+idObj;
            break;
=======
            case '69':
                window.location.href = "../../negocio/Ng_tbl_moneda.php?delMo="+idObj;
                break;
            case '70':
                window.location.href = "../../negocio/Ng_tbl_denominacion.php?delDe="+idObj;
                break;
            case '71':
                window.location.href = "../../negocio/Ng_tbl_denominacion.php?delTa="+idObj;
                break;
>>>>>>> erick_branch_fin
        }
    }, 
    
    function(e,btn){
        e.preventDefault();
    });
}