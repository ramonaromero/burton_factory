<?php
include("../config/conexion.php");

$fecha = $_GET['fecha'];

$horas = [];

$sql = $conexion->query("SELECT hora FROM citas WHERE fecha='$fecha' AND estado='reservada'");

while($row = $sql->fetch_assoc()){
    $horas[] = substr($row['hora'], 0, 5);
}

echo json_encode($horas);