<?php
$title = "Agregar un Usuario";
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
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                            <label for="inputPasswordConfirm">Confirmar contraseña</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0 row">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Agregar usuario</button>
                                    <button type="button" class="btn btn-secondary btn-lg btn-danger my-2">Descartar usuario</button>
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