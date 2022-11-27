<?php
include_once("../entidades/tbl_usuario.php");
include_once("../datos/Dt_tbl_usuario.php");

$us = new Tbl_Usuario();
$dtu = new Dt_tbl_usuario();

if ($_POST) {
    $usuario = $_POST["user"];
    $password = $_POST["pass"];

    if (empty($usuario) and empty($password)) {
        header("Location: /proyectoKermesse/Login.php?msj=8");
    } else {
        $us = $dtu->validarUser($usuario, $password);
        if (empty($us)) {
            header("Location: /proyectoKermesse/Login.php?msj=9");
        } else {
            session_start();
            $_SESSION['acceso'] = $us;
            if (!isset($_SESSION['acceso'])) {
                header("Location: /proyectoKermesse/Login.php");
            } else {
                header("Location: /proyectoKermesse/index.php");
            }

        }
    }
}