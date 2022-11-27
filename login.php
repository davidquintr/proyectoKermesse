<?php
$title = "Login";
$direct = "./";

session_start();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title?></title>

    <!-- Custom fonts for this template-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?php echo $direct; ?>css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert.css" />

</head>

<body class="bg-gradient-primary">
    <script src="<?php echo $direct; ?>dependencies/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert.min.js"></script>
    <script src="<?php echo $direct; ?>dependencies/jAlert/dist/jAlert-functions.min.js"> //optional!!</script>
    <script src="<?php echo $direct; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $direct; ?>assets/js/sb-admin-2.js"></script>
    <script src="<?php echo $direct; ?>dependencies/js/messageSetters.js"></script>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido de vuelta</h1>
                                    </div>
                                    <form action="./negocio/Ng_login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="user" name="user" type="user"
                                                placeholder="Nombre de Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" id="pass" name="pass" type="password" placeholder="Contraseña">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Iniciar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
</body>

</html>