<?php

include_once("../entidades/tbl_comunidad.php");
include_once("../datos/Dt_tbl_comunidad.php");
$direct = "../";

$comunidad = new Tbl_Comunidad();
$dtComunidad = new Dt_tbl_comunidad();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $comunidad->__SET('nombre', $_POST['comunidadName']);
                $comunidad->__SET('responsable', $_POST['responsable']);
                $comunidad->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $comunidad->__SET('estado', 1);
                $dtComunidad->insertarComunidad($comunidad);

                header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $comunidad->__SET('id_comunidad', $_POST['idComunidad']);
                $comunidad->__SET('nombre', $_POST['comunidadName']);
                $comunidad->__SET('responsable', $_POST['responsable']);
                $comunidad->__SET('desc_contribucion', $_POST['desc_contribucion']);
                $comunidad->__SET('estado', 1);
                $dtComunidad->editComunidad($comunidad);

                header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $comunidad->__SET('id_comunidad', $_GET['delRo']);
        $dtComunidad->deleteComunidad($comunidad->__GET('id_comunidad'));
        header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/comunidad/gestionar.php?msj=4");
        die($e->getMessage());

    }
}