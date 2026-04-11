<?php
session_start();
include("../config/conexion.php");

if (isset($_SESSION["id_usuario"])) {
    header("Location: /burton_factory/paginas/reservar.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario["password"])) {

            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["email"] = $usuario["email"];

            if (isset($_GET['redirect'])) {
            header("Location: " . $_GET['redirect']);
            } else {
         header("Location: reservar.php");
        }
        exit;       

        } else {
            $error = "Mecanismo de identificación fallido";
        }

    } else {
        $error = "Ni siquiera Jack con su linterna ha logrado encontrar ese usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    
    <meta charset="UTF-8">
    <title>Iniciar sesión - Burton Factory</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>

<section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" alt="Burton Factory Logo" class="crew-logo">
        </a>

        <h2 class="crew-title">SALA BURTON</h2>
    </div>

    <p class="section-intro">
        Entra a tu rincón de la fábrica y sigue creando tu estilo
    </p>

</section>


<section class="login-container">

    <div class="login-box">

        <?php 
        if (isset($error)) {
            echo "<div class='alerta'>$error</div>";
        }
        ?>

        <form method="POST" class="login-form">

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Contraseña</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-burton">
                Entrar en la fábrica
            </button>

        </form>

        <div class="registro">
            ¿Todavía no formas parte de la familia Burton?
            <br>
            <a href="registro.php">Regístrate</a>
        </div>

    </div>

</section>
<?php include("../paginas/footer.php"); ?>
</body>
</html>