<?php

include_once '../Controlador/EmpleadoDaoImp.php';

$rut = $_POST["rutModificar"];

$salida = EmpleadoDaoImp::getUsuario($rut);
session_start();

$_SESSION["salida"] = EmpleadoDaoImp::getUsuario($rut);
session_commit();
include_once 'v_ModificarEmpleado.php';
