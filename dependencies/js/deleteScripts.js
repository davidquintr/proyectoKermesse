
function deleteUser(idUser){
    confirm(function(e,btn){
        e.preventDefault();
        window.location.href = "../../negocio/Ng_tbl_usuario.php?delU="+idUser;
    }, 
    
    function(e,btn){
        e.preventDefault();
    });
}