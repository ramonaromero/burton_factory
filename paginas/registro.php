<?php
session_start();
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"]; 

    
    if (
        strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[\W]/', $password)
    ) {
        $error = "La contraseña debe tener mínimo 8 caracteres, una mayúscula, una minúscula, un número y un símbolo.";
    }

    
    if (!isset($error)) {

        $sql_verificar = "SELECT * FROM usuarios WHERE email='$email'";
        $resultado = $conexion->query($sql_verificar);

        if ($resultado->num_rows > 0) {
            $error = "Ese email ya pertenece a otra criatura de la fábrica.";
        }
    }

    
    if (!isset($error)) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql_insertar = "INSERT INTO usuarios (email, password) 
                         VALUES ('$email', '$password_hash')";

        if ($conexion->query($sql_insertar) === TRUE) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Algo oscuro ha ocurrido. Inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">   
    <meta charset="UTF-8">
    <title>Registro - Burton Factory</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>

<body>


<section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" alt="Burton Factory Logo" class="crew-logo">
        </a>

        <h2 class="crew-title">ÚNETE A LA TRIPULACIÓN</h2>
    </div>

    <p class="section-intro">
        Accede al corazón de la fábrica y activa tu perfil
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
            <input type="password" name="password" id="password" required>

            
            <p id="passwordHelp" style="font-size:12px; color:#aaa;">
                Debe tener 8 caracteres, una mayúscula, una minúscula, un número y un símbolo
            </p>

            <button type="submit" class="btn-burton">
                Crear cuenta
            </button>

        </form>

        <div class="registro">
            ¿Ya tienes cuenta?
            <br>
            <a href="login.php">Inicia sesión</a>
        </div>

    </div>

</section>


<script>
const passwordInput = document.getElementById('password');
const help = document.getElementById('passwordHelp');

passwordInput.addEventListener('input', function() {

    let val = passwordInput.value;

    let valido =
        val.length >= 8 &&
        /[A-Z]/.test(val) &&
        /[a-z]/.test(val) &&
        /[0-9]/.test(val) &&
        /[\W]/.test(val);

    if (valido) {
        help.style.color = "#4CAF50";
    } else {
        help.style.color = "#ff4444";
    }

});
</script>
<?php include("../paginas/footer.php"); ?>
</body>
</html>