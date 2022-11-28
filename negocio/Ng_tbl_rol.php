<?php

include_once("../entidades/tbl_rol.php");
include_once("../datos/Dt_tbl_rol.php");

$rol = new Tbl_Rol();
$dtRol = new Dt_tbl_rol();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $rol->__SET('rol_descripcion', $_POST['rolname']);
                $rol->__SET('estado', 1);
                $dtRol->insertarRol($rol);

                header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $rol->__SET('id_rol', $_POST['idU']);
                $rol->__SET('rol_descripcion', $_POST['rolname']);
                $rol->__SET('estado', 2);
                $dtRol->editRol($rol);

                header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $rol->__SET('id_rol', $_GET['delRo']);
        $dtRol->deleteRol($rol->__GET('id_rol'));
        header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/rol/gestionar.php?msj=4");
        die($e->getMessage());

    }
}