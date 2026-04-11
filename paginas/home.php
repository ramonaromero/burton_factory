<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Burton Factory</title>

        <link rel="stylesheet" href="../assets/css/estilos.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="main-wrapper">

   
    <header class="header-home">

        <div class="login-area">
            <?php if(isset($_SESSION['usuario'])): ?>
                <a href="logout.php" class="btn-logout">Cerrar sesión</a>
            <?php else: ?>
                <a href="login.php" class="btn-burton">INICIAR SESIÓN</a>
                <a href="registro.php" class="btn-burton">CREAR CUENTA</a>
            <?php endif; ?>
        </div>

    </header>

    <div class="hero">

        <div class="hero-top">
            <img src="../assets/img/logo.png" alt="Logo Burton Factory">

            <div class="hero-text">
                <h1>BURTON FACTORY</h1>
                <h2>TU CABEZA, NUESTRA REVOLUCIÓN</h2>
            </div>
        </div>

        <div class="hero-links">
            <a href="burton_crew.php">BURTON CREW</a>
            <a href="catalogo.html">CATÁLOGO</a>
            <a href="boletinburtoniano.php">BOLETÍN</a>
            <a href="contacto.php">CONTACTO</a>
        </div>

    </div>

    <section class="historia-burton">

        <h2 class="historia-titulo">EL ORIGEN DE LA FÁBRICA</h2>

        <div class="historia-contenido">
            <div class="historia-col">

            <p>
              Bienvenido a <strong>Burton Factory,</strong> el lugar donde la precisión mecánica se funde con el arte del acero y el cabello. Ubicada en el corazón de 
              la Región de Murcia, esta <strong>"fábrica de estilo"</strong> redefine el concepto de la peluquería convencional: cada cita se integra como parte de un engranaje perfectamente coordinado. Hemos diseñado 
              cada rincón para ofrecerte un ambiente auténtico y distinto, adaptándonos a tu estilo para que el resultado final sea, sencillamente, <strong>impecable.</strong>
            </p>
            </div>
            <div class="historia-col">
            <p>
                Para que tu experiencia sea tan fluida como una máquina bien engrasada, hemos forjado una <strong>plataforma de reservas online</strong>.
                Olvídate de las esperas innecesarias, a través de nuestra web, tendrás el control total para navegar por nuestros servicios, elegir a tu artesano de confianza y asegurar tu espacio
                en nuestra cadena de montaje. Un par de clics son el único impulso que necesitas para poner nuestra maquinaria a trabajar para tí. 
            </p>
            </div>

            <div class="historia-img">
        <img src="../assets/img/img3.png" alt="Historia Burton">
        </div> 
            </div>

  <p class="historia-final">
                Burton Factory, donde <strong> tu estilo se forja con actitud de artista</strong>
                <br>
                
            </p>
</div>


<section class="mapa-burton">

    <h3 class="mapa-titulo">VEN A VISITARNOS</h3>

    <div class="mapa-contenido">

        <iframe 
            src="https://www.google.com/maps?q=Calle+Plateria+Murcia&output=embed"
            loading="lazy">
        </iframe>
            </div>
    <div class="mapa-boton">
        <a href="https://www.google.com/maps/dir/?api=1&destination=Calle+Plateria+Murcia"
       target="_blank"
       class="btn-burton">
       
    </a>
    </div>
 </section>

 <section class="footer-burton">

    <div class="footer-contenido">

       
        <div class="footer-left">
            <div class="footer-logo">
                <img src="../assets/img/logo.png" alt="Logo Burton Factory">
            </div>

            <div class="footer-social-vertical">
                <a href="https://www.instagram.com/burtonfactory" class="btn-burton social-btn"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/34617899308" class="btn-burton social-btn"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="btn-burton social-btn"><i class="fab fa-github"></i></a>
            </div>
        </div>

      
        <div class="footer-links">
            <a href="burton_crew.php">BURTON CREW</a>
            <a href="catalogo.html">CATÁLOGO</a>
            <a href="boletinburtoniano.php">BOLETÍN</a>
            <a href="contacto.php">CONTACTO</a>
        </div>

      
        <div class="footer-newsletter">
            <form>
                <input type="email" placeholder="EMAIL">
                <button type="submit" class="btn-burton">SUSCRÍBETE</button>
            </form>
        </div>

    </div>

  
    <div class="footer-linea"></div>

   
    <div class="footer-legal">
        <a href="avisolegal.php">Aviso Legal</a>
        <a href="privacidad.php">Política de Privacidad</a>
        <a href="cookies.php">Cookies</a>
    </div>

</section>

    </div>
</section>
</body>
</html>