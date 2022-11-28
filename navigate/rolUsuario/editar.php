<?php
$title = "Editar Rol Usuario";
$direct = "../../";
include '../../partials/top.php';
include_once("{$direct}entidades/tbl_rol.php");
include_once("{$direct}entidades/tbl_usuario.php");

include_once("{$direct}datos/Dt_tbl_rol.php");
include_once("{$direct}datos/Dt_tbl_usuario.php");

include_once("{$direct}datos/Dt_rol_usuario.php");

$dtRol = new Dt_tbl_rol();
$dtUsr = new Dt_tbl_usuario();
$dtRolUsr = new Dt_rol_usuario();

$varIdU = 0;
if (isset($varIdU)) {
    $varIdU = $_GET['varEnter'];
}

$rolUsr = $dtRolUsr->getRolUsrById($varIdU);

?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Rol Usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Rol Usuario</li>
        <li class="breadcrumb-item active">Editar Rol Usuario</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_rol_usuario.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion" />
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="usuario" name="usuario"
                                        title="Seleccione una Región">
                                        <?php
                                        foreach ($dtUsr->listarUsuarios() as $usr):
                                            if ($usr->id_usuario == $varIdU):
                                        ?>
                                        <option value="<?php echo $usr->id_usuario ?>">
                                        <?php echo $usr->usuario ?>
                                        </option>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="rol" name="rol" title="Seleccione una Región"
                                        required>
                                        <?php
                                        foreach ($dtRol->listarRoles() as $rol):
                                        ?>
                                        <option <?php if($rol->id_rol == $rolUsr->tbl_rol_id_rol){ echo "selected";}; ?> value="<?php echo $rol->id_rol?>"> <?php echo $rol->rol_descripcion?> </option>
                                        <?php
                                        endforeach;
                                        ?>  
                                    </select>
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