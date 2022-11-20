<?php
$title = "Agregar un usuario";
$direct = "../../";
include '../../partials/top.php';
?>
    <div class="container-fluid px-4">
    <h1 class="mt-4">Agregar usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Usuarios</li>
        <li class="breadcrumb-item active">Agregar usuario</li>

    </ol>
    <div id="layoutAuthentication_content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow p-3 border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="../../negocio/Ng_tbl_usuario.php">
                                <input type="hidden" value="1" name="txtaccion" id="txtaccion"/>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="username" name="username" type="text" title="Nombre de usuario" required/>
                                    <label for="pwd">Nombre de usuario</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="names" name="names" type="text" title="Nombres" required/>
                                    <label for="pwd">Nombres</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="secnames" name="secnames" type="text" title="Apellidos" required/>
                                    <label for="pwd">Apellidos</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="text" title="Correo" required/>
                                    <label for="pwd">Correo electrónico</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="pass" name="pass" type="password" title="Contraseña" required/>
                                    <label for="pwd">Contraseña</label>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar usuario</button>
                                    <button type="reset" class="btn btn-outline-danger my-2">Descartar usuario</button> 
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