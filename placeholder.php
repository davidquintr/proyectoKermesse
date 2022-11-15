<?php

include_once("../entidades/countries.php");
include_once("../datos/dt_Countries.php");

$c = new Countries();
$dtc = new Dt_Countries();

if ($_POST) {
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $c->__SET('country_id', $_POST['country_id']);
                $c->__SET('country_name', $_POST['country_name']);
                $c->__SET('region_id', $_POST['region_id']);

                $dtc->regCountry($c);
                //var_dump($emp);
                header("Location: /HR/pages/catalogos/tbl_countries.php?msj=1");
            } 
            catch (Exception $e) 
            {
                header("Location: /HR/pages/catalogos/tbl_countries.php?msj=2");
                die($e->getMessage());
            }
            break;
        
        case '2':
            try 
            {
                //CONSTRUIMOS EL OBJETO
                //ATRIBUTO ENTIDAD //NAME DEL CONTROL
                $c->__SET('country_id', $_POST['country_id']);
                $c->__SET('country_name', $_POST['country_name']);
                $c->__SET('region_id', $_POST['region_id']);
        
                $dtc->editCountry($c);
                //var_dump($emp);
                header("Location: /HR/pages/catalogos/tbl_countries.php?msj=3");
            } 
            catch (Exception $e) 
            {
                header("Location: /HR/pages/catalogos/tbl_countries.php?msj=4");
                die($e->getMessage());
            }
            break;
        
        default:
            # code...
            break;
    }


}

if ($_GET) 
{
    try 
    {
        
        $c->__SET('country_id', $_GET['delC']);
        $dtc->deleteCountry($c->__GET('country_id'));
        header("Location: /HR/pages/catalogos/tbl_countries.php?msj=5");
    }
    catch(Exception $e)
    {
        header("Location: /HR/pages/catalogos/tbl_countries.php?msj=6");
        die($e->getMessage());
    }
}