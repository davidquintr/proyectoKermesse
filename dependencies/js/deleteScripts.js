
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
            case 'listprod':
                window.location.href = "../../negocio/Ng_tbl_listaPrecios.php?delList="+idObj;
            break;
            case 'prod':
                window.location.href = "../../negocio/Ng_tbl_listaPrecios.php?delprod="+idObj;
            break;
            case '69':
                window.location.href = "../../negocio/Ng_tbl_moneda.php?delMo="+idObj;
                break;
            case '70':
                window.location.href = "../../negocio/Ng_tbl_denominacion.php?delDe="+idObj;
                break;
            case '71':
                window.location.href = "../../negocio/Ng_tbl_denominacion.php?delTa="+idObj;
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
            case 'arqc':
                window.location.href = "../../negocio/Ng_tbl_arqueocaja.php?delAc="+idObj;
            break;
            case 'opc':
                window.location.href = "../../negocio/Ng_tbl_opciones.php?delOc="+idObj;
            break;
            case 'comuni':
                window.location.href = "../../negocio/Ng_tbl_comunidad.php?delCom="+idObj;
            break;
            case 'delBonos':
                window.location.href = "../../negocio/Ng_tbl_control_bonos.php?delBon="+idObj;
            break;
            case 'delIngCom':
                window.location.href = "../../negocio/Ng_tbl_ingreso_comunidad.php?delIngCo="+idObj;
            break;
        }
    }, 
    
    function(e,btn){
        e.preventDefault();
    });
}