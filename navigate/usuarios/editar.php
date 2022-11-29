<?php
error_reporting(0);
$title = "Editar Usuario";
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

?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Editar usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href= "<?php echo $direct;?>index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Usuarios</li>
        <li class="breadcrumb-item active">Editar usuario</li>
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
                                    <input class="form-control" id="userID" name="userID" type="text" title="ID de usuario" value="<?php echo $user->id_usuario;?>" disabled/>
                                    <input class="form-control" id="idU" name="idU" type="hidden" title="ID de usuario" value="<?php echo $user->id_usuario;?>"/>
                                    <label for="userID">userID</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="username" type="text" title="Nombre de usuario" value="<?php echo $user->usuario;?>" disabled/>
                                    <label for="username">Nombre de usuario</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="names" name="names" type="text" title="Nombres" value="<?php echo $user->nombres;?>" required/>
                                    <label for="names">Nombres</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="secnames" name="secnames" type="text" title="Apellidos" value="<?php echo $user->apellidos;?>" required/>
                                    <label for="secnames">Apellidos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="text" title="Correo" value="<?php echo $user->email;?>" required/>
                                    <label for="email">Correo electrónico</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="pass" name="pass" type="password" title="Contraseña" required/>
                                    <label for="pass">Contraseña</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="confpass" name="confpass" type="password" title="Confirmar Contraseña" required/>
                                    <label for="confpass">Confirme su contraseña</label>
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
<script src="../../dependencies/js/messageSetters.js"></script>
<?php
include '../../partials/bottom.php';
?>