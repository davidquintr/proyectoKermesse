<?php

$direct = "../";
include_once("../entidades/tbl_categoria_gastos.php");
include_once("../datos/Dt_tbl_categoria_gastos.php");

session_start();

if (empty($_SESSION['acceso'])) {
    header("Location: {$direct}Login.php");
    die();
}

$usuario = $_SESSION['acceso'];

$catGastos = new Tbl_categoria_gastos();
$dtCatGastos = new Dt_tbl_categoria_gastos();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {
        case '1':
            try {
                $catGastos->__SET('id_categoria_gastos', $_POST['idCG']);
                $catGastos->__SET('nombre_categoria', $_POST['categorianame']);
                $catGastos->__SET('descripcion', $_POST['descripcion']);
                $catGastos->__SET('estado', 1);
                $dtCatGastos->insertarCatGastos($catGastos);

                header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {              
                $catGastos->__SET('id_categoria_gastos', $_POST['idCG']);
                $catGastos->__SET('nombre_categoria', $_POST['categorianame']);
                $catGastos->__SET('descripcion', $_POST['descripcion']);
                $catGastos->__SET('estado', 2);

                $dtCatGastos->editCatGastos($catGastos);

                header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=3");
            } catch (Exception $e) {
                header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=4");
                die($e->getMessage());

            }
            break;
    }
}

if ($_GET) {
    try {
        $catGastos->__SET('id_categoria_gastos', $_GET['delCatGas']);
        $dtCatGastos->deleteCatGastos($catGastos->__GET('id_categoria_gastos'));
        header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/categoria_gastos/gestionar.php?msj=4");
        die($e->getMessage());

    }
}