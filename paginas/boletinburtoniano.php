<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BOLETÍN BURTONIANO</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
            <img src="../assets/img/logo.png" alt="Burton Factory Logo" class="crew-logo">
        </a>
        <h2 class="crew-title">BOLETÍN BURTONIANO</h2>
    </div>

    <p class="section-intro">
        Crónicas de la Fábrica: Arte, Vapor y Estilo desde el Corazón de Murcia.
    </p>

</section>




<section class="boletin-secciones">

  
    <div class="boletin-bloque">
        <div class="boletin-grid tres">

            <div class="boletin-card">
                <img src="../assets/img/blog/secciones/botanica.png" alt="Botánica en Marcha">
                <div class="boletin-card-content">
                    <h3>Botánica en Marcha</h3>
                    <p>Tratamientos naturales, hierbas y cuidado consciente.</p>
                    <a href="articulos.php?seccion=botanica" class="btn-burton">
                        Explorar sección
                    </a>
                </div>
            </div>

    
            <div class="boletin-card">
                <img src="../assets/img/blog/secciones/cromaticaprofunda.png" alt="Cromática Profunda">
                <div class="boletin-card-content">
                    <h3>Cromática Profunda</h3>
                    <p>Psicología del color, tendencias y el alma del estilo.</p>
                    <a href="articulos.php?seccion=cromatica" class="btn-burton">
                        Explorar sección
                    </a>
                </div>
            </div>

           
            <div class="boletin-card">
                <img src="../assets/img/blog/secciones/geometria.png" alt="Geometría Viva">
                <div class="boletin-card-content">
                    <h3>Geometría Viva</h3>
                    <p>Técnicas de corte, estructura facial y fuerza visual.</p>
                    <a href="articulos.php?seccion=geometria" class="btn-burton">
                        Explorar sección
                    </a>
                </div>
            </div>

        </div>
    </div>


    <div class="boletin-bloque">
        <div class="boletin-grid dos">

            <div class="boletin-card">
                <img src="../assets/img/blog/secciones/gabineterud.png" alt="El Gabinete de Rud">
                <div class="boletin-card-content">
                    <h3>El Gabinete de Rud</h3>
                    <p>Barbería clásica, rituales de afeitado y gestión del tiempo.</p>
                    <a href="articulos.php?seccion=gabineterud" class="btn-burton">
                        Explorar sección
                    </a>
                </div>
            </div>

            <div class="boletin-card">
                <img src="../assets/img/blog/secciones/destellos.png" alt="Destellos de Maisie">
                <div class="boletin-card-content">
                    <h3>Destellos de Maisie</h3>
                    <p>Peinados creativos, looks rápidos y energía joven.</p>
                    <a href="articulos.php?seccion=destellos" class="btn-burton">
                        Explorar sección
                    </a>
                </div>
            </div>

        </div>
    </div>

</section>

</body>
</html>