<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?php echo $direct;?>css/styles.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo $direct;?>dependencies/jAlert/dist/jAlert.css" />
    </head>
    <body class="sb-nav-fixed">
            <!-- jQuery -->
            <script src="<?php echo $direct;?>dependencies/js/scripts.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
            <!-- Descargar el bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

            <!-- JS DATATABLES -->
            <script src="<?php echo $direct;?>dependencies/DataTables/datatables.min.js"></script>

            <!--<script src="./DataTables/Responsive-2.3.0/js/responsive.bootstrap5.min.js"></script>-->
            <script src="<?php echo $direct;?>dependencies/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Responsive-2.3.0/js/responsive.dataTables.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/JSZip-2.5.0/jszip.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>
            <!--jAlert-->

            <!--script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="js/datatables-simple-demo.js"></script>-->
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>-->
            <script src="<?php echo $direct;?>dependencies/fontawesome-free-6.2.0/js/all.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/jAlert/dist/jAlert.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/jAlert/dist/jAlert-functions.min.js"> //optional!!</script>
            
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="<?php echo $direct?>index.php">Kermesse</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inicio</div>
                            <a class="nav-link" href="<?php echo $direct?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Panel de control
                            </a>
                            <div class="sb-sidenav-menu-heading">Navegación</div>


                            <a class="nav-link" href="<?php echo $direct?>navigate/arqueocaja/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Arqueo caja
                            </a>
                            
                            <a class="nav-link" href="<?php echo $direct?>navigate/arqueocaja_det/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Arqueo caja det
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/categoria_gastos/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Categoría Gastos
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/comunidad/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Comunidad
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/controlBonos/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Control Bonos
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/denominacion/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Denominación
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/gastos/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Gastos
                            </a>
                            
                            <a class="nav-link" href="<?php echo $direct?>navigate/ingresoComunidad/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ingreso Comunidad
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/ingresoComunidadDet/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ingreso Comunidad Det
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/kermesse/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kermesse
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/moneda/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Moneda
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/opciones/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Opciones
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/parroquia/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Parroquia
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/rol/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rol
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/rolOpciones/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rol Opciones
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/rolUsuario/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Rol Usuario
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/tasacambio/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tasa de cambio
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/tasacambio_det/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tasa de cambio Det
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/productos/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Producto
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/categoria_producto/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Categoria de producto
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/listaPrecios/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lista de Precios
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/listaprecio_det/gestionar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Lista de precio Det
                            </a>

                            <a class="nav-link" href="<?php echo $direct?>navigate/usuarios/gestionar.php?msj=1">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Usuarios
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Just Example
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>/