<?php

$direct = "../";
include_once("../entidades/tbl_parroquia.php");
include_once("../datos/Dt_tbl_parroquia.php");

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: {$direct}Login.php");
    die();
}

$usuario = $_SESSION['acceso'];

$parroquia = new Tbl_parroquia();
$dtParroquia = new Dt_tbl_parroquia();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $parroquia->__SET('nombre', $_POST['parroquianame']);
                $parroquia->__SET('direccion', $_POST['direccion']);
                $parroquia->__SET('telefono', $_POST['telefono']);
                $parroquia->__SET('parroco', $_POST['parroco']);
                $parroquia->__SET('logo', $_POST['logo']);
                $parroquia->__SET('sitio_web', $_POST['sitio_web']);
                $dtParroquia->insertarParroquia($parroquia);

                header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $parroquia->__SET('idParroquia', $_POST['idP']);
                $parroquia->__SET('nombre', $_POST['parroquianame']);
                $parroquia->__SET('direccion', $_POST['direccion']);
                $parroquia->__SET('telefono', $_POST['telefono']);
                $parroquia->__SET('parroco', $_POST['parroco']);
                $parroquia->__SET('logo', $_POST['logo']);
                $parroquia->__SET('sitio_web', $_POST['sitio_web']);

                $dtParroquia->editParroquia($parroquia);

                header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $parroquia->__SET('idParroquia', $_GET['delParr']);
        $dtParroquia->deleteParroquia($parroquia->__GET('idParroquia'));
        header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/parroquia/gestionar.php?msj=4");
        die($e->getMessage());

    }
}