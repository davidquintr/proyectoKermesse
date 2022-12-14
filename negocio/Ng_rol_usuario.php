<?php

include_once("../entidades/rol_usuario.php");
include_once("../datos/Dt_rol_usuario.php");

$rolUsr = new Rol_Usuario();
$dtRolUsr = new Dt_rol_usuario();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $rolUsr->__SET('tbl_usuario_id_usuario', $_POST['usuario']);
                $rolUsr->__SET('tbl_rol_id_rol', $_POST['rol']);

                $dtRolUsr->insertarRolUsuario($rolUsr);
                header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

            case '2':
                try {              
                    $rolUsr->__SET('id_rol_usuario', $_POST['idRolU']);
                    $rolUsr->__SET('tbl_usuario_id_usuario', $_POST['usuario']);
                    $rolUsr->__SET('tbl_rol_id_rol', $_POST['rol']);
                    $dtRolUsr->editRolUsr($rolUsr);
    
                    header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=3");
                } catch (Exception $e) {
                    header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=4");
                    die($e->getMessage());
    
                }
                break;
    }
}

if ($_GET) {
    try {
        $rolUsr->__SET('id_rol_usuario', $_GET['delRu']);
        $dtRolUsr->deleteRolUsr($rolUsr->id_rol_usuario);
        echo $rolUsr->id_rol_usuario;
        header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/rolUsuario/gestionar.php?msj=4");
        die($e->getMessage());
    }
}