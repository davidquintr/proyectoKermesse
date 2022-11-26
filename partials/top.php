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
        <link href="<?php echo $direct;?>css/sb-admin-2.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo $direct;?>dependencies/jAlert/dist/jAlert.css" />
    </head>
    <body id="page-top">
            <script src="<?php echo $direct;?>dependencies/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
            <!-- Descargar el bootstrap -->
            <script src="<?php echo $direct;?>assets/js/bootstrap.bundle.min.js"></script>
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
        
            <script src="<?php echo $direct;?>dependencies/fontawesome-free-6.2.0/js/all.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/jAlert/dist/jAlert.min.js"></script>
            <script src="<?php echo $direct;?>dependencies/jAlert/dist/jAlert-functions.min.js"> //optional!!</script>

            <script src="<?php echo $direct;?>assets/js/Chart.min.js   "></script>
            
            <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion h-100 position-sticky sticky-top" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
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
                    <a class="nav-link toggletoggle" role="button" >
                        <i class="fa-solid fa-bars"></i>
                    </a>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <li class="nav-item dropdown no-arrow flex-row-reverse" >
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle"
                                src="https://cdn-icons-png.flaticon.com/512/64/64572.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Cerrar Sesión
                        </a>
                    </div>
                </li>

            </ul>

        </nav>

        <div class="container-fluid">
        <script src="<?php echo $direct;?>assets/js/sb-admin-2.js"></script>