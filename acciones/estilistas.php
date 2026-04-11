<?php
include("../config/conexion.php");

$sql = "SELECT * FROM estilistas";
$resultado = $conn->query($sql);
?>

<h2>Burton Crew</h2>

<ul>
<?php
while ($fila = $resultado->fetch_assoc()) {
    echo "<li>";
    echo $fila["nombre"] . " (" . $fila["especialidad"] . ")";
    echo " - Horario: " . $fila["hora_inicio"] . " a " . $fila["hora_fin"];
    echo "</li>";
}
?>
</ul>
