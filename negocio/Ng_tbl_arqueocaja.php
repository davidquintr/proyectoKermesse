<?php
include_once("../entidades/tbl_arqueocaja.php");
include_once("../datos/Dt_tbl_arqueocaja.php");
include_once("../entidades/tbl_arqueocaja_det.php");
include_once("../datos/Dt_tbl_arqueocaja_det.php");

$direct = "../";

$arqueoCaja = new Tbl_Arqueocaja();
$dtArq = new Dt_tbl_Arqueocaja();

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $arqueoCaja->__SET('idKermesse', $_POST['kermesse']);
                $arqueoCaja->__SET('fechaArqueo', $date);
                $arqueoCaja->__SET('estado',1);
                $arqueoCaja->__SET('usuario_creacion', 1);
                $arqueoCaja->__SET('fecha_creacion', $date);
                $arqueoCaja->__SET('granTotal', 0.0);
                $dtArq->insertarArqueo($arqueoCaja);
                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;
/*
        case 2:
            try {

                if ($_POST['confpass'] != $_POST['pass']) {
                    header("Location: /proyectoKermesse/navigate/usuarios/editar.php?msj=5&varEnter={$_POST['idU']}");
                    die();
                }

                $usr->__SET('id_usuario', $_POST['idU']);
                $usr->__SET('pwd', $_POST['pass']);
                $usr->__SET('nombres', $_POST['names']);
                $usr->__SET('apellidos', $_POST['secnames']);
                $usr->__SET('email', $_POST['email']);
                $usr->__SET('estado', 2);
                $dtUsr->editUser($usr);

                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=3");
            } catch (Exception $e) {

                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=4");
                die($e->getMessage());

            }

            break;*/
    }
}

if ($_GET) {
    try {
        $usr->__SET('id_usuario', $_GET['delU']);
        $dtUsr->deleteUser($usr->__GET('id_usuario'));
        header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=4");
        die($e->getMessage());

    }
}