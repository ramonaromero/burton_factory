<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <title>CONTACTO</title>

    <link rel="stylesheet" href="../assets/css/estilos.css">

  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>


<section class="crew-section">

    <div class="crew-header">
        <a href="home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" alt="Burton Factory Logo" class="crew-logo">
        </a>

        <h2 class="crew-title">CONTACTO</h2>
    </div>

    <p class="section-intro">
        Si el engranaje ha comenzado a girar, escríbenos.
    </p>

</section>



<section class="contact-container">

    <?php if(isset($_GET['enviado'])): ?>
        <p class="contact-success">
            Mensaje enviado correctamente.
        </p>
    <?php endif; ?>
  <div class="gear-container">
    <img src="../assets/img/engranaje3.png" class="gear-img">
    </div>

    <form class="contact-form" method="POST" action="../acciones/enviar_contacto.php">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Asunto</label>
            <input type="text" name="asunto">
        </div>

        <div class="form-group">
            <label>Mensaje</label>
            <textarea name="mensaje" rows="6" required></textarea>
        </div>

        <div class="form-submit">
            <button type="submit" class="btn-burton">
                ENVIAR MENSAJE
            </button>
        </div>

    </form>

</section>

<?php include("../paginas/footer.php"); ?>
</body>
</html>