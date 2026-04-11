<?php
include("../config/conexion.php");


$id_servicio = $_POST['id_servicio'];
$id_estilista = $_POST['id_estilista'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$token= bin2hex(random_bytes(32));


$id_usuario = 1;


$sql = "INSERT INTO citas (id_usuario, id_estilista, id_servicio, fecha, hora, token)
        VALUES ('$id_usuario', '$id_estilista', '$id_servicio', '$fecha', '$hora', '$token')";

if ($conexion->query($sql) === TRUE) {
    echo "✅ Tu cita ha sido ensamblada correctamente";
} else {
    echo "❌ Error: " . $conexion->error;
}
?>

