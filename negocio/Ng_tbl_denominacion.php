<?php
include_once("../entidades/tbl_denominacion.php");
include_once("../datos/Dt_tbl_denominacion.php");
$direct = "../";

$denominacion = new Tbl_denominacion();
$dtDenominacion = new Dt_tbl_denominacion();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $denominacion->__SET('idMoneda', $_POST['moneda']);
                $denominacion->__SET('valor', $_POST['valor']);
                $denominacion->__SET('valor_letras', $_POST['valorlet']);
                $denominacion->__SET('estado', 1);
                $dtDenominacion->insertarDenominacion($denominacion);

                header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {
                $denominacion->__SET('id_Denominacion', $_POST['idU']);
                $denominacion->__SET('idMoneda', $_POST['moneda']);
                $denominacion->__SET('valor', $_POST['valor']);
                $denominacion->__SET('valor_letras', $_POST['valorlet']);
                $denominacion->__SET('estado', 2);
                $dtDenominacion->editDenominacion($denominacion);

                header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=4");
                die($e->getMessage());
            }
            break;
    }
}

if ($_GET) {
    try {
        $denominacion->__SET('id_denominacion', $_GET['delDe']);
        $dtDenominacion->deleteDenominacion($denominacion->__GET('id_denominacion'));
        header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/denominacion/gestionar.php?msj=4");
        die($e->getMessage());
    }
}