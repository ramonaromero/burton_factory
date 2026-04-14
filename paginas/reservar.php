<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("../config/conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../acciones/PHPMailer/src/Exception.php';
require __DIR__ . '/../acciones/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../acciones/PHPMailer/src/SMTP.php';

if (!isset($_SESSION["id_usuario"])) {
    $redirect = $_SERVER['REQUEST_URI'];
    header("Location: login.php?redirect=" . urlencode($redirect));
    exit;
}

$id_usuario = $_SESSION["id_usuario"];
$categoria_preseleccionada = $_GET['categoria'] ?? '';


$categorias = ["corte","color","peinados","tratamientos","barbería"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servicios_seleccionados = $_POST["servicios"] ?? [];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    if (empty($servicios_seleccionados)) {
        $error = "Selecciona al menos un servicio.";
    }

    if (!isset($error) && date('N', strtotime($fecha)) >= 6) {
        $error = "La fábrica está cerrada los fines de semana.";
    }

    if (!isset($error)) {

        $hora_actual = strtotime($hora);

        $lista_servicios = "";
        $lista_estilistas = "";
        $total_precio = 0;
        $token_global = bin2hex(random_bytes(32));

        foreach ($servicios_seleccionados as $id_servicio) {

            $sql_serv = $conexion->query("SELECT * FROM servicios WHERE id_servicio=$id_servicio");
            $servicio = $sql_serv->fetch_assoc();

            if (!$servicio) {
                $error = "Servicio inválido.";
                break;
            }

            $categoria = $servicio["categoria"];
            $duracion = $servicio["duracion"];

            $lista_servicios .= "• {$servicio['nombre']} ({$servicio['precio']}€)<br>";
            $total_precio += $servicio["precio"];

            $sql_est = $conexion->query("SELECT * FROM estilistas WHERE especialidad='$categoria' LIMIT 1");
            $estilista = $sql_est->fetch_assoc();

            if (!$estilista) {
                $error = "No hay estilista disponible.";
                break;
            }

            $id_estilista = $estilista["id_estilista"];
            $lista_estilistas .= "• {$estilista['nombre']}<br>";

            $inicio = isset($estilista["horario_inicio"]) ? strtotime($estilista["horario_inicio"]) : strtotime("09:00");
            $fin = isset($estilista["horario_fin"]) ? strtotime($estilista["horario_fin"]) : strtotime("18:00");

            if ($hora_actual < $inicio || $hora_actual >= $fin) {
                $error = "Horario fuera del turno.";
                break;
            }

            $hora_fin = strtotime("+$duracion minutes", $hora_actual);

            if ($hora_fin > $fin) {
                $error = "No hay tiempo suficiente para completar los servicios.";
                break;
            }

            $sql_check = $conexion->query("SELECT * FROM citas 
                WHERE id_estilista=$id_estilista 
                AND fecha='$fecha' 
                AND hora='$hora'");

            if ($sql_check->num_rows > 0) {
                $error = "Horario ocupado.";
                break;
            }

            $token = $token_global;

            $sql_insert = "INSERT INTO citas 
                (id_usuario, id_servicio, id_estilista, fecha, hora, estado, token)
                VALUES 
                ('$id_usuario','$id_servicio','$id_estilista','$fecha','$hora','reservada','$token')";

            $conexion->query($sql_insert);

            $hora_actual = $hora_fin;
        }

        if (!isset($error)) {

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'iromerofuente@gmail.com';
                $mail->Password = 'mrnizlucuopdsfpj';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->CharSet = 'UTF-8';

                $mail->setFrom('iromerofuente@gmail.com', 'Burton Factory');
                $mail->addAddress($_SESSION["email"]);
                $mail->addAddress('iromerofuente@gmail.com');
                $mail->addEmbeddedImage('../assets/img/logo.png', 'logo_burton');
                $mail->isHTML(true);
                $mail->Subject = "Tu cita se ha ensamblado";

                $cancelar_url =  "http://localhost/burton_factory/paginas/vercita.php?token=$token_global";

                $fecha_formateada = date("d/m/Y", strtotime($fecha));
                
                $mail->Body = "
                
                <div style='font-family: Courier New; background:#111; padding:20px; color:#eee;'>

                <div style='max-width:600px;margin:auto;background:#1c1c1c;padding:25px;border-radius:10px;'>

                     <div style='text-align:center; margin-bottom:10px;'>
                         <img src='cid:logo_burton' width='110'><br>
                      <h2 style='
                        color:#C5A059;
                        font-family: Courier New, monospace;
                        letter-spacing: 1px;
                        margin: 0;
                        '>
                        BURTON FACTORY
                        </h2>
                </div>

                <p style='
                text-align:center;
                color: #F5F5F5;
                font-family: Courier New, monospace;        
                '>
                Tu estilo está en proceso de creación
                </p>

                 <hr>

                <p><strong>Fecha:</strong> $fecha_formateada</p>
                <p><strong>Hora:</strong> $hora</p>

                <hr>

                <p><strong>Servicios:</strong></p>
                $lista_servicios

                <p><strong>Estilista:</strong></p>
                $lista_estilistas

                <p><strong>Total:</strong> $total_precio €</p>

                <hr>

                <p><strong>Dirección:</strong><br>
                Calle Platería, Murcia</p>

                <div style='text-align:center;margin-top:20px;'>
                 <a href='$cancelar_url'
                 style='background:#891A1A;color:white;padding:10px 20px;
                    text-decoration:none;border-radius:6px;'>
                 Gestionar cita
                 </a>
            </div>

    </div>
</div>
";

                $mail->send();

                header("Location: reservar.php?ok=1");
                exit;

            } catch (Exception $e) {
                $error = "Error enviando correo.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<meta charset="UTF-8">
<title>Reservar</title>
<link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>

<section class="crew-section">

   <section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" class="crew-logo">
        </a>

        <h2 class="crew-title">CÁMARA DE RESERVAS</h2>
    </div>

    <p class="section-intro">
        Tu transformación empieza aquí: estética creada a golpe de metal y creatividad.
    </p>

</section> 
    
<section class="login-container">
<div class="login-box">

<?php if (isset($error)): ?>
    <div class="alerta"><?= $error ?></div>
<?php endif; ?>

<?php if (isset($_GET['ok'])): ?>
    <p class="alerta-exito">
        Tu cita ha sido ensamblada<br>
        El proceso creativo ya está en marcha
    </p>
<?php endif; ?>

<form method="POST">

<?php foreach($categorias as $categoria): ?>
<?php $servicios_cat = $conexion->query("SELECT * FROM servicios WHERE categoria='$categoria'"); ?>


<div class="categoria-box <?= ($categoria_preseleccionada == $categoria) ? 'activa' : '' ?>" data-categoria="<?= $categoria ?>">
<h3 class="categoria-titulo"><?= strtoupper($categoria) ?></h3>

<?php while($s = $servicios_cat->fetch_assoc()): ?>

<label class="servicio-linea">
<div class="servicio-texto">
<strong><?= $s['nombre'] ?></strong>
<span><?= $s['duracion'] ?> min</span>
<span class="precio"><?= $s['precio'] ?>€</span>
</div>

<input type="checkbox"
name="servicios[]"
value="<?= $s['id_servicio'] ?>"
data-precio="<?= $s['precio'] ?>"
data-nombre="<?= $s['nombre'] ?>">
</label>

<?php endwhile; ?>
</div>

<?php endforeach; ?>

<label>Fecha</label>
<input type="date" name="fecha"
min="<?= date('Y-m-d') ?>"
max="<?= date('Y-m-d', strtotime('+2 months')) ?>"
required>

<label>Hora</label>
<div class="hora-wrapper">
    <select name="hora" id="horaSelect" required>
        <option value="">Selecciona hora</option>
    </select>
</div>

<div class="resumen-cita" id="resumen">
Tu cita se ensamblará aquí...
</div>

<div class="form-submit">
<button type="submit" class="btn-burton">ENSAMBLAR CITA</button>
</div>

</form>

</div>


</section>
<?php if (isset($_SESSION["id_usuario"])): ?>
    <div class="logout-container">
        <a href="/burton_factory/acciones/logout.php" class="btn-burton logout-btn">
            Cerrar sesión</a>
    </div>
        <?php endif;?>
<script>
const servicios = document.querySelectorAll('input[name="servicios[]"]');
const fechaInput = document.querySelector('input[name="fecha"]');
const horaSelect = document.getElementById('horaSelect');
const resumen = document.getElementById('resumen');


function generarHoras() {

    horaSelect.innerHTML = '<option value="">Selecciona hora</option>';

    for (let h = 9; h < 18; h++) {
        ["00","30"].forEach(min => {

            let hora = String(h).padStart(2, '0') + ":" + min;

            let option = document.createElement("option");
            option.value = hora;
            option.textContent = hora;

            horaSelect.appendChild(option);
        });
    }
}

generarHoras();


function formatearFecha(fecha) {
    if (!fecha) return "";
    let partes = fecha.split("-");
    return `${partes[2]}/${partes[1]}/${partes[0]}`;
}


function actualizarResumen() {

    let seleccionados = [];
    let total = 0;

    servicios.forEach(s => {
        if (s.checked) {
            seleccionados.push(s.dataset.nombre);
            total += parseFloat(s.dataset.precio);
        }
    });

    let fecha = fechaInput.value;
    let hora = horaSelect.value;

    if (seleccionados.length === 0 && !fecha && !hora) {
        resumen.innerHTML = "Aquí verás el resumen de tu transformación...";
        return;
    }

    resumen.innerHTML = `
    <strong>Tu próxima cita</strong><br>
    ${fecha ? formatearFecha(fecha) : ""}<br>
    ${hora ? hora : ""}<br><br>
    Servicios:<br>
    ${seleccionados.map(s => "• " + s).join("<br>")}<br><br>
    Total: ${total}€
`;
   
}


servicios.forEach(s => s.addEventListener('change', actualizarResumen));
fechaInput.addEventListener('change', actualizarResumen);
horaSelect.addEventListener('change', actualizarResumen);


const categoriaURL = "<?= $categoria_preseleccionada ?>";

if (categoriaURL) {
    const elemento = document.querySelector(`[data-categoria="${categoriaURL}"]`);
    if (elemento) {
        elemento.scrollIntoView({ behavior: "smooth", block: "center" });
    }
}

</script>
<script>
window.addEventListener("load", function() {

    var categoria = "<?= $categoria_preseleccionada ?>";

    <?php if (isset($_GET['ok'])): ?>

        window.scrollTo({ top: 0, behavior: "smooth" });

    <?php else: ?>

        if (categoria !== "") {
            var elemento = document.querySelector('[data-categoria="' + categoria + '"]');

            if (elemento) {
                elemento.scrollIntoView({
                    behavior: "smooth",
                    block: "start"
                });
            }
        }

    <?php endif; ?>

});
</script>

<?php include("../paginas/footer.php"); ?>
</body>
</html>