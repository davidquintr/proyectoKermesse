<?php
error_reporting(0);
$title = "Editar usuario";
$direct = "../../";
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_usuario.php';
include_once '../../entidades/tbl_usuario.php';

$varIdU = 0;
if(isset($varIdU)){ 
  $varIdU = $_GET['varEnter'];
}

$dtUsuario = new Dt_tbl_usuario();
$user = $dtUsuario->getUserByID($varIdU);

$dtUsuario = new Dt_tbl_usuario();
$usuarios = $dtUsuario->listarUsuarios();

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Ver usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href= "<?php echo $direct;?>index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Usuarios</li>
        <li class="breadcrumb-item active">Ver usuario</li>
    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_usuario.php">
                                <input type="hidden" value="2" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="idUser" name="idUser" type="text" title="ID de usuario" value="<?php echo $user->id_usuario;?>" disabled/>
                                    <label for="pwd">ID</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="username" type="text" title="Nombre de usuario" value="<?php echo $user->usuario;?>" disabled/>
                                    <label for="pwd">Nombre de usuario</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="names" name="names" type="text" title="Nombres" value="<?php echo $user->nombres;?>" disabled/>
                                    <label for="pwd">Nombres</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="secnames" name="secnames" type="text" title="Apellidos" value="<?php echo $user->apellidos;?>" disabled/>
                                    <label for="pwd">Apellidos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="text" title="Correo" value="<?php echo $user->email;?>" disabled/>
                                    <label for="pwd">Correo electrónico</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="pass" name="pass" type="password" title="Contraseña" disabled/>
                                    <label for="pwd">Contraseña</label>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Finalizar edición</button>
                                    <button type="reset" class="btn btn-outline-danger my-2">Descartar edición</button> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script></script>
<?php
include '../../partials/bottom.php';
?>