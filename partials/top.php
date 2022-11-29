<?php
include_once "{$direct}entidades/tbl_usuario.php";
include_once "{$direct}datos/Dt_rol_usuario.php";
include_once "{$direct}datos/Dt_rol_opciones.php";

$usuario = new Tbl_Usuario();
$dtRolUsr = new Dt_rol_usuario();
$dtRolOpc = new Dt_rol_opciones();

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: {$direct}Login.php");
    die();
}

$usuario = $_SESSION['acceso'];
$titleBd =  str_replace(' ','',$title);

$resp = $dtRolUsr->getIdRol($usuario[0]->id_usuario);

$respRol = $dtRolOpc->getOpc($resp, $titleBd);

if(empty($respRol)){
    header("Location: {$direct}403.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php echo $title; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?php echo $direct; ?>css/sb-admin-2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert.css" />
</head>

<body id="page-top">
    <script src="<?php echo $direct; ?>dependencies/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $direct; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/datatables.min.js"></script>
    <script
        src="<?php echo $direct; ?>dependencies/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>
    <script
        src="<?php echo $direct; ?>dependencies/DataTables/Responsive-2.3.0/js/responsive.dataTables.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>

    <script src="<?php echo $direct; ?>dependencies/fontawesome-free-6.2.0/js/all.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

    <script src="<?php echo $direct; ?>assets/js/Chart.min.js"></script>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion h-100 position-sticky sticky-top"
            id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $direct ?>index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Proyecto Kermesse</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Panel
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo $direct ?>index.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Seguridad</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/opciones/gestionar.php">Opciones</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/rol/gestionar.php">Rol</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/rolOpciones/gestionar.php">Rol-Opciones</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/rolUsuario/gestionar.php">Rol-Usuario</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/usuarios/gestionar.php">Usuarios</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-solid fa-coins"></i>
                    <span>Finanzas</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/arqueoCaja/gestionar.php">Arqueo Caja</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/categoria_gastos/gestionar.php">Categoría Gastos</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/categoria_producto/gestionar.php">Categoría Producto</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/controlBonos/gestionar.php">Control Bonos</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/denominacion/gestionar.php">Denominación</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/gastos/gestionar.php">Gastos</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/ingresoComunidad/gestionar.php">Ingreso Comunidad</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/listaPrecios/gestionar.php">Lista Precios</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/moneda/gestionar.php">Moneda</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/productos/gestionar.php">Productos</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/tasacambio/gestionar.php">Tasa Cambio</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa-solid fa-sitemap"></i>
                    <span>Organización</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/comunidad/gestionar.php">Comunidad</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/kermesse/gestionar.php">Kermesse</a>
                        <a class="collapse-item" href="<?php echo $direct ?>navigate/parroquia/gestionar.php">Parroquia</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link toggletoggle" role="button">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow flex-row-reverse">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $usuario[0]->usuario ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/64/64572.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo "{$direct}Login.php?logout=1"; ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">
                    <script src="<?php echo $direct; ?>assets/js/sb-admin-2.js"></script>