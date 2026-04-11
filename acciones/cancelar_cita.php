<?php
include("../config/conexion.php");

if(isset($_GET['token'])) {

    $token = $_GET['token'];

    $sql = "UPDATE citas SET estado='cancelada' WHERE token='$token'";
    $conexion->query($sql);

    echo "<h2>Tu cita ha sido cancelada.</h2>";
}
?>