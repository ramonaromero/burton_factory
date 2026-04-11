<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../config/conexion.php");

$token = $_GET['token'] ?? null;

if (!$token) {
    die("Token inválido");
}


$sql = $conexion->query("
    SELECT c.*, s.nombre AS servicio, s.precio, e.nombre AS estilista
    FROM citas c
    JOIN servicios s ON c.id_servicio = s.id_servicio
    JOIN estilistas e ON c.id_estilista = e.id_estilista
    WHERE c.token = '$token'
");

if ($sql->num_rows == 0) {
    die("Cita no encontrada");
}

$citas = [];
$total = 0;

while ($row = $sql->fetch_assoc()) {
    $citas[] = $row;
    $total += $row['precio'];
}


$cita_base = $citas[0];

$fecha_formateada = date("d/m/Y", strtotime($cita_base['fecha']));
$estado = $cita_base['estado'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    
<meta charset="UTF-8">
<title>Tu cita - Burton Factory</title>
<link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>

<div class="main-wrapper">

<section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" class="crew-logo">
        </a>

        <h2 class="crew-title">TU CITA</h2>
    </div>

    <p class="section-intro">
        Aquí puedes consultar el estado de tu creación.
    </p>

</section>

<section class="login-container">
<div class="login-box">

<div class="resumen-cita">

    <p><strong>Fecha:</strong> <?= $fecha_formateada ?></p>
    <p><strong>Hora:</strong> <?= $cita_base['hora'] ?></p>

    <p><strong>Estado:</strong> 
        <?= $estado == 'cancelada' ? 'Cancelada' : 'Confirmada' ?>
    </p>

    <hr>

    <p><strong>Servicios:</strong></p>

    <?php foreach ($citas as $c): ?>
        <p>• <?= $c['servicio'] ?> (<?= $c['precio'] ?>€)</p>
    <?php endforeach; ?>

    <hr>

    <p><strong>Estilistas:</strong></p>

    <?php foreach ($citas as $c): ?>
        <p>• <?= $c['estilista'] ?></p>
    <?php endforeach; ?>

    <hr>

    <p><strong>Total:</strong> <?= $total ?> €</p>

</div>

<?php if ($estado != 'cancelada'): ?>

    <a href="../acciones/cancelar_cita.php?token=<?= $token ?>" 
       class="btn-burton"
       style="background:#8b0000; display:block; text-align:center; margin-top:20px;">
       Cancelar cita
    </a>

<?php else: ?>

    <p style="margin-top:20px; text-align:center;">
        Esta cita ya ha sido cancelada.
    </p>

<?php endif; ?>

</div>
</section>

</div>
<?php include("../paginas/footer.php"); ?>
</body>
</html>