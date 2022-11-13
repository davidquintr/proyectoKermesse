<?php
$title = "Gestionar usuarios";
$direct = "../../";
error_reporting(0);
include '../../partials/top.php';
include_once '../../datos/Dt_tbl_usuario.php';
include_once '../../entidades/tbl_usuario.php';

$dtUsuario = new Dt_tbl_usuario();
$usuarios = $dtUsuario->listarUsuarios();
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar usuarios</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item">Gestión de Usuarios</li>
        <li class="breadcrumb-item active">Editar usuarios</li>
        </ol>
        <div class="row">
            <div class="col-sm-3 bg-secondary rounded">
                <p class="fw-bold my-3 text-white text-center">Usuarios</p>
                <button type="button" class="btn btn-outline-light w-100 my-1">Light</button>
                <button type="button" class="btn btn-outline-light w-100 my-1">Light</button>
            </div>
            <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card border-0 rounded-lg my-2">
                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">Nombres</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Apellidos</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Correo elecrónico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                            <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                                        </div>  
                                        <div class="mt-4 mb-0 row">
                                            <button type="button" class="btn btn-primary btn-lg btn-block">Conservar cambios</button>
                                            <button type="button" class="btn btn-secondary btn-lg btn-danger my-2">Descartar cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
include 'partials/bottom.php';
?>