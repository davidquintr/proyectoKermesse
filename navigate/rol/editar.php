<?php
$title = "Editar Rol";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_rol.php';
include_once '../../entidades/tbl_rol.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtRol = new Dt_tbl_rol();
$rol = $dtRol->getRolByID($varIdU);

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar Rol</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Roles</li>
        <li class="breadcrumb-item active">Agregar Rol</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_rol.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="rolID" name="rolID" type="text" title="ID" value="<?php echo $rol->id_rol;?>" disabled/>
                                    <input class="form-control" id="idU" name="idU" type="hidden" title="ID" value="<?php echo $rol->id_rol;?>"/>
                                    <label for="rolID">ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="rolname" name="rolname" type="text" title="Nombre del rol" value="<?php echo $rol->rol_descripcion?>" required/>
                                    <label for="username">Nombre del rol</label>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Finalizar edición</button>
                                    <button type="reset" class="btn btn-danger btn-block my-2">Descartar edición</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../partials/bottom.php';
?>