<?php

include_once("../entidades/tbl_productos.php");
include_once("../datos/Dt_tbl_productos.php");

$prod = new Tbl_Productos();
$dtprod = new Dt_tbl_productos();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $prod->__SET('id_comunidad', $_POST['comunidad']);
                $prod->__SET('id_cat_producto', $_POST['catProd']);
                $prod->__SET('nombre', $_POST['nombre']);
                $prod->__SET('descripcion', $_POST['descripcion']);
                $prod->__SET('cantidad', $_POST['cantidad']);
                $prod->__SET('preciov_sugerido', $_POST['precioS']);
                $prod->__SET('estado', 1);
                $dtprod->insertarProductos($prod);
                header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {

                $prod->__SET('id_producto', $_POST['prodID']);
                $prod->__SET('id_comunidad', $_POST['comunidad']);
                $prod->__SET('id_cat_producto', $_POST['catProd']);
                $prod->__SET('nombre', $_POST['nombre']);
                $prod->__SET('descripcion', $_POST['descripcion']);
                $prod->__SET('cantidad', $_POST['cantidad']);
                $prod->__SET('preciov_sugerido', $_POST['precioS']);
                $prod->__SET('estado', 2);
                $dtprod->editprod($prod);

                header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=3");
            } catch (Exception $e) {

                header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=4");
                die($e->getMessage());

            }

            break;
    }
}

if ($_GET) {
    try {
        $prod->__SET('id_producto', $_GET['delprod']);
        $dtprod->deleteProducto($prod->__GET('id_producto'));
        header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/Productos/gestionar.php?msj=4");
        die($e->getMessage());

    }
}