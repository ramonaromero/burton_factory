<?php
include("../config/conexion.php");

$sql = "SELECT * FROM servicios";
$resultado = $conn->query($sql);
?>

<h2>Catálogo Burton: carta de servicios</h2>

<ul>
<?php
while ($fila = $resultado->fetch_assoc()) {
    echo "<li>";
    echo $fila["nombre"] . " - " . $fila["duracion"] . " min - " . $fila["precio"] . "€";
    echo "</li>";
}
?>
</ul>
