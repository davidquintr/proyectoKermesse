<?php
include_once("../entidades/tbl_Lista_Precio.php");
include_once("../datos/Dt_tbl_lista_precio.php");
include_once("../entidades/tbl_ListaPrecio_Det.php");
include_once("../datos/Dt_tbl_listaprecio_det.php");

$direct = "../";

$listP = new Tbl_Lista_Precio();
$listPDet = new Tbl_ListaPrecio_Det();

$dtlistp = new Dt_tbl_lista_precio();
$dtlistpDet = new Dt_tbl_listaprecio_det();



if ($_POST) {
    $varAccion = $_POST['txtaccion'];
    switch ($varAccion) {

        case '1':
            try {
                $listP->__SET('id_kermesse', $_POST['kermesse']);
                $listP->__SET('nombre',$_POST['nombre']);
                $listP->__SET('descripcion',$_POST['descripcion']);
                $listP->__SET('estado', 1);
                $dtlistp->insertarlistprecio($listP);

                $allListp = $dtlistp->listarPrecio();
                $listPDet->__SET('id_lista_precio',$allListp[count($allListp) - 1]->__GET('id_lista_precio'));
                $listPDet->__SET('id_producto', $_POST['producto']);
                $listPDet->__SET('precio_venta', $_POST['precioV']);
                $dtlistpDet->insertarlistpreciodet($listPDet);

                header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=1");
            } catch (Exception $ex) {
                header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;

            case 2:
                try {
                    $listP->__SET('id_lista_precio',$_POST['idlist']);
                    $listP->__SET('id_kermesse', $_POST['kermesse']);
                    $listP->__SET('nombre',$_POST['nombre']);
                    $listP->__SET('descripcion',$_POST['descripcion']);
                    $listP->__SET('estado', 2);
                    $dtlistp->editListprecio($listP);
    
                $listPDet = $dtlistpDet->getListPDetByID($listP->id_lista_precio);
                $listPDet->__SET('id_producto', $_POST['producto']);
                $listPDet->__SET('precio_venta', $_POST['precioV']);
                $dtlistpDet->editListpreciodet($listPDet);
    
                header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=3");
                } catch (Exception $e) {
    
                header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=4");
                    die($e->getMessage());
            }

            break;
    }
}

if ($_GET) {
    try {
        $listP->__SET('id_lista_precio', $_GET['delList']);
        $dtlistp->deleteListPrecio($listP->__GET('id_lista_precio'));
        header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=6");

    } catch (Exception $e) {
        header("Location: /proyectoKermesse/navigate/listaPrecios/gestionar.php?msj=4");
        die($e->getMessage());

    }
}