<?php

$direct = "../";
include_once("../entidades/tbl_kermesse.php");
include_once("../datos/Dt_tbl_kermesse.php");
include_once("{$direct}entidades/tbl_usuario");

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: {$direct}Login.php");
    die();
}

$usuario = $_SESSION['acceso'];

$kermesse = new Tbl_kermesse();
$dtKermesse = new Dt_tbl_kermesse();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $kermesse->__SET('idParroquia', $_POST['parroquia']);
                $kermesse->__SET('nombre', $_POST['kermessename']);
                $kermesse->__SET('fInicio', $_POST['fInicio']);
                $kermesse->__SET('fFinal', $_POST['fFinal']);
                $kermesse->__SET('descripcion', $_POST['descripcion']);
                $kermesse->__SET('estado', 1);
                $kermesse->__SET('usuario_creacion', 1);
                $kermesse->__SET('fecha_creacion', $date);
                $dtKermesse->insertarKermesse($kermesse);

                header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $kermesse->__SET('id_kermesse', $_POST['idKermesse']);
                $kermesse->__SET('idParroquia', $_POST['parroquia']);
                $kermesse->__SET('fInicio', $_POST['fInicio']);
                $kermesse->__SET('fFinal', $_POST['fFinal']);
                $kermesse->__SET('descripcion', $_POST['descripcion']);
                $kermesse->__SET('estado', 2);

                $dtKermesse->editKermesse($kermesse);

                header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $kermesse->__SET('id_kermesse', $_GET['delKer']);
        $dtKermesse->deleteRol($kermesse->__GET('id_kermesse'));
        header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/kermesse/gestionar.php?msj=4");
        die($e->getMessage());

    }
}