<?php
require_once("config.php");

if (isset($_POST["guardar"])) {
    $config = new Config();

    $config->setNombre($_POST["nombre"]);
    $config->setCelular($_POST["celular"]);
    $config->setDireccion($_POST["direccion"]);
    $config->setImagen($_POST["imagen"]);
    $config->insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente'); document.location = 'facturas.php';</script>";
}
?>
