<?php

include_once("../entidades/tbl_usuario.php");
include_once("../datos/Dt_tbl_usuario.php");

$usr = new tbl_usuario();
$dtUsr = new Dt_tbl_usuario();

if($_POST){
    $varAccion = $_POST['txtaccion'];
    switch($varAccion){
        
        case '1': 
            try{
                $usr->__SET('usuario',$_POST['username']);
                $usr->__SET('nombres',$_POST['names']);
                $usr->__SET('apellidos',$_POST['secnames']);
                $usr->__SET('email',$_POST['email']);
                $usr->__SET('pwd',$_POST['pass']);
                $usr->__SET('estado',1);

                $dtUsr->insertarUsuario($usr);
                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=1");
            }catch(Exception $ex){
                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=2");
                die($e->getMessage());
            }

            break;
        
        case 2:
            try{
                $usr->__SET('id_usuario', $_POST['idU']);
                $usr->__SET('pwd', $_POST['pass']);
                $usr->__SET('nombres', $_POST['names']);
                $usr->__SET('apellidos', $_POST['secnames']);
                $usr->__SET('email', $_POST['email']);
                $usr->__SET('estado', 2);
                $dtUsr->editUser($usr);

                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=3");
            } 
            catch (Exception $e){
                
                header("Location: /proyectoKermesse/navigate/usuarios/gestionar.php?msj=4");
                die($e->getMessage());

            }

            break;
    }

}