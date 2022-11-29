<?php

$direct = "../";
include_once("../entidades/tbl_gastos.php");
include_once("../datos/Dt_tbl_gastos.php");
include_once("{$direct}entidades/tbl_usuario");

date_default_timezone_set("America/Managua");
$date = date('Y/m/d', time());

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: {$direct}Login.php");
    die();
}

$usuario = $_SESSION['acceso'];

$gastos = new tbl_gastos();
$dtGastos = new Dt_tbl_gastos();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
            
                $gastos->__SET('idKermesse', $_POST['kermesse']);
                $gastos->__SET('idCatGastos', $_POST['idCatGastos']);
                $gastos->__SET('fechaGasto', $_POST['fechaGasto']);
                $gastos->__SET('concepto', $_POST['concepto']);
                $gastos->__SET('monto', $_POST['monto']);
                $gastos->__SET('usuario_creacion', 1);
                $gastos->__SET('fecha_creacion', $date);
                $gastos->__SET('estado', 1);
            
                $dtGastos->insertarGastos($gastos);

                header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $gastos->__SET('id_registro_gastos', $_POST['idG']);
                $gastos->__SET('idKermesse', $_POST['kermesse']);
                $gastos->__SET('idCatGastos', $_POST['categoriaGastos']);
                $gastos->__SET('fechaGasto', $_POST['fechaGasto']);
                $gastos->__SET('concepto', $_POST['concepto']);
                $gastos->__SET('monto', $_POST['monto']);
                $gastos->__SET('estado', 2);

                $dtGastos->editGastos($gastos);

                header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $gastos->__SET('id_registro_gastos', $_GET['delGas']);
        $dtGastos->deleteGastos($gastos->__GET('id_registro_gastos'));
        header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/gastos/gestionar.php?msj=4");
        die($e->getMessage());

    }
}