<?php
$direct = "./";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acceso Restringido</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        accesskey="" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="<?php echo $direct; ?>css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert.css" />

</head>

<body id="page-top">
    <script src="<?php echo $direct; ?>assets/js/sb-admin-2.js"></script>
    <div id="content-wrapper" class="d-flex flex-column mt-5">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto" data-text="403">403</div>
                    <p class="lead text-gray-800 mb-5">Forbidden</p>
                    <p class="text-gray-500 mb-0">No tiene acceso a esta página..</p>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Proyecto Kermesse 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>

</body>

</html>