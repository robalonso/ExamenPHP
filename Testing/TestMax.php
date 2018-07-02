<?php

include_once '../Controlador/ParticularDaoImp.php';

$max = ParticularDaoImp::ObtenerUltimo();

echo "Máximo: " . $max;