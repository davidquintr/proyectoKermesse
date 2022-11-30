<?php
$title = "Inicio";
$direct = "./";
include 'partials/top.php';
?>
<div class="card-group mx-4 my-4 gap-3">
    <div class="card border border-primary rounded" style="width: 18rem;">
        <img class="card-img-top" src="./assets/img/parroquia.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Parroquia</h5>
            <p class="card-text">Sistema de configuración de la parroquia</p>
            <a href="./navigate/parroquia/gestionar.php" class="btn btn-primary">Ver</a>
        </div>
    </div>
    <div class="card border border-primary rounded" style="width: 18rem;">
        <img class="card-img-top" src="./assets/img/usuarios.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Usuarios</h5>
            <p class="card-text">Sistema de administración de usuario</p>
            <a href="./navigate/usuarios/gestionar.php" class="btn btn-primary">Ver</a>
        </div>
    </div>
    <div class="card border border-primary rounded" style="width: 18rem;">
        <img class="card-img-top" src="./assets/img/kermesse.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Kermesse</h5>
            <p class="card-text">Sistema de administración de kermesse</p>
            <a href="./navigate/kermesse/gestionar.php" class="btn btn-primary">ver</a>
        </div>
    </div>
</div>
<div class="alert alert-primary text-center" role="alert">
  Integrantes del equipo
</div>

<div class="d-flex gap-3 mb-1 align-items-center justify-content-center">
    <img src="./assets/img/fotodaniel.jpg" class="rounded-circle" width="128px">
    <div class="mx-3">
        <h5 class="my-0">Daniel Rafael Rodríguez Ramírez<span class="badge badge-secondary mx-3">ISI</span></h5>
        <a href="https://github.com/DanRod08" target="_blank"><span class="badge badge-pill badge-info">GitHub</span></a>
    </div>
</div>
<div class="d-flex gap-3 mb-1 align-items-center justify-content-center">
    <img src="./assets/img/fotodeibi.png" class="rounded-circle" width="128px">
    <div class="mx-3">
        <h5 class="my-0">David Mauricio Quintanilla Ruiz<span class="badge badge-secondary mx-3">ISI</span></h5>
        <a href="https://github.com/davidquintr" target="_blank"><span class="badge badge-pill badge-info">GitHub</span></a>
    </div>
</div>
<div class="d-flex gap-3 mb-1 align-items-center justify-content-center">
    <img src="./assets/img/fotoponce.png" class="rounded-circle" width="128px">
    <div class="mx-3">
        <h5 class="my-0">David Sebastián Parrales Ponce<span class="badge badge-secondary mx-3">ISI</span></h5>
        <a href="https://github.com/Poncka" target="_blank"><span class="badge badge-pill badge-info">GitHub</span></a>
    </div>
</div>
<div class="d-flex gap-3 mb-1 align-items-center justify-content-center">
    <img src="./assets/img/fotoerick.png" class="rounded-circle" width="128px">
    <div class="mx-3">
        <h5 class="my-0">Erick Oswaldo González Gallegos<span class="badge badge-secondary mx-3">ISI</span></h5>
        <a href="https://github.com/VarEros" target="_blank"><span class="badge badge-pill badge-info">GitHub</span></a>
    </div>
</div>
<div class="d-flex gap-3 mb-1 align-items-center justify-content-center">
    <img src="./assets/img/fotoriuske.png" class="rounded-circle" width="128px">
    <div class="mx-3">
        <h5 class="my-0">Riuske Mateo Nishime Robleto<span class="badge badge-secondary mx-3">ISI</span></h5>
        <a href="https://github.com/RiuskeKMS" target="_blank"><span class="badge badge-pill badge-info">GitHub</span></a>
    </div>
</div>

<?php
include 'partials/bottom.php';
?>