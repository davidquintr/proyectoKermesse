<?php

include_once("../entidades/tbl_Categoria_Producto.php");
include_once("../datos/Dt_tbl_categoria_producto.php");

$catprod = new Tbl_Categoria_Producto();
$dtprodcat = new Dt_tbl_categoria_producto();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $catprod->__SET('nombre', $_POST['nombre']);
                $catprod->__SET('descripcion', $_POST['descripcion']);
                $catprod->__SET('estado', 1);
                $dtprodcat->insertarCatProductos($catprod);
                header("Location: /proyectoKermesse/navigate/categoria_producto/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/categoria_producto/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

        case '2':
            try {

                $prodcat->__SET('id_producto', $_POST['prodID']);
                $prodcat->__SET('id_comunidad', $_POST['comunidad']);
                $prodcat->__SET('id_cat_producto', $_POST['catProd']);
                $prodcat->__SET('nombre', $_POST['nombre']);
                $prodcat->__SET('descripcion', $_POST['descripcion']);
                $prodcat->__SET('cantidad', $_POST['cantidad']);
                $prodcat->__SET('preciov_sugerido', $_POST['precioS']);
                $prodcat->__SET('estado', 2);
                // $dtprodcat->editprod($prod);

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
        $usr->__SET('id_usuario', $_GET['delU']);
        $dtUsr->deleteUser($usr->__GET('id_usuario'));
        header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=4");
        die($e->getMessage());

    }
}