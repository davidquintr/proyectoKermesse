
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
            case '5':
                window.location.href = "../../negocio/Ng_tbl_categoriaGastos.php?delCatGas="+idObj;
            break;
            case '6':
                window.location.href = "../../negocio/Ng_tbl_gastos.php?delGas="+idObj;
            break;
            case '7':
                window.location.href = "../../negocio/Ng_tbl_parroquia.php?delParr="+idObj;
            break;
            case '8':
                window.location.href = "../../negocio/Ng_tbl_kermesse.php?delKer="+idObj;
            break;
        }
    }, 
    
    function(e,btn){
        e.preventDefault();
    });
}