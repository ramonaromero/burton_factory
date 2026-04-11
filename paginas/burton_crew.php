<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Burton Crew</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="main-wrapper">

    
    <section class="crew-section">

        <div class="crew-header">
            <a href="../paginas/home.php" class="crew-logo-link">
                <img src="../assets/img/logo.png" alt="Burton Factory Logo" class="crew-logo">
            </a>
            <h2 class="crew-title">BURTON CREW</h2>
        </div>

        <p class="section-intro">
            Bajo el vapor y el ruido, ellos son el alma: talento, carácter y pasión en cada engranaje.
        </p>

    </section>


    
    <div class="page-wrapper">

        
        <section class="crew-card">
            <img src="../assets/img/burton_crew/emmapettigrew.png" alt="Emma Pettigrew" class="crew-img">
            <div class="crew-info">
                <h3 class="crew-name">EMMA PETTIGREW</h3>
                <p class="crew-subtitulo">La Fuerza que Sostiene</p>
                <p class="crew-texto">
                    Emma es la experta en cortes, combina firmeza e intención en cada movimiento. Tiene una energía
                    que parece inagotable, una garra que contagia y una valentía que inspira. Es la fuerza del salón, esa presencia que da
                    seguridad incluso en los días más caóticos. 
                    
                </p>
                <p class="crew-texto">
                    Emma también es la chispa del salón, la que suelta un comentario picante en el momento justo. 
                    Para el equipo, Emma es la compañera que resuelve, la chispa que enciende, la fuerza que nunca falla.
                </p>
                <a href="reservar.php?categoria=corte" class="btn-burton">
                    RESERVAR SERVICIO
                </a>
            </div>
        </section>

      
        <section class="crew-card">
            <img src="../assets/img/burton_crew/s.cutterwald.png" alt="S. Cutterwald" class="crew-img">
            <div class="crew-info">
                <h3 class="crew-name">S. CUTTERWALD</h3>
                <p class="crew-subtitulo">El Maestro del Color y del Alma</p>
                <p class="crew-texto">
                    Cutterwald es el eje central del equipo, la figura que mantiene la armonía en el salón.
                    Dicen que nació con un pincel en la mano, lo cierto es que tiene un don: entiende a las personas
                    con solo mirarlas.
                </p>
                <p class="crew-texto">
                    Actúa como guía y apoyo: orienta decisiones, calma tensiones y mantiene el equilibrio del grupo. Su risa 
                    es contagiosa, su humor es inteligente y su presencia convierte el salón en un lugar donde los clientes
                    se sienten seguros y bienvenidos. Cutterwald es el corazón de la fábrica. 

                </p>
                <a href="reservar.php?categoria=color" class="btn-burton">
                    RESERVAR SERVICIO
                </a>
            </div>
        </section>

        
        <section class="crew-card">
            <img src="../assets/img/burton_crew/maisieholloway.png" alt="Maisie Holloway" class="crew-img">
            <div class="crew-info">
                <h3 class="crew-name">MAISIE HOLLOWAY</h3>
                <p class="crew-subtitulo">La Flor del Equipo</p>
                <p class="crew-texto">
                    Maisie se encarga de los peinados y tiene un talento innato: desde recogidos de boda hasta looks para ocasiones especiales
                    o peinados sencillos para un día cualquiera. Sus manos trabajan con suavidad, con cariño, ve formas, volúmenes y texturas donde otros solo ven mechones.
                </p>
                <p class="crew-texto">
                    Pese a ser la más joven, su creatividad es tan natural como su alegría y provoca carcajadas
                    sin darse cuenta. Aporta alegría desde que entra por la puerta del salón. Maisie es la luz que ilumina la fábrica.
                </p>
                <a href="reservar.php?categoria=peinados" class="btn-burton">
                    RESERVAR SERVICIO
                </a>
            </div>
        </section>

     
        <section class="crew-card">
            <img src="../assets/img/burton_crew/fionashelby.png" alt="Fiona Shelby" class="crew-img">
            <div class="crew-info">
                <h3 class="crew-name">FIONA SHELBY</h3>
                <p class="crew-subtitulo">La Alquimista Rebelde</p>
                <p class="crew-texto">
                    Es el vínculo de lo natural en Burton. Trabaja rodeada de frascos de vidrio, hierbas secadas al sol 
                    y aceites que ella misma prepara. No toca químicos ni utiliza nada que no haya mezclado con sus propias manos.
                </p>
                <p class="crew-texto">
                    Cuando Fiona trabaja, el ambiente se transforma: todo se vuelve más lento, más consciente aunque también más 
                    impredecible. Sus compañeros dicen que huele a mar y tormenta. Ella es la magia que les conecta. 
                </p>
                <a href="reservar.php?categoria=tratamientos" class="btn-burton">
                    RESERVAR SERVICIO
                </a>
            </div>
        </section>

     
        <section class="crew-card">
            <img src="../assets/img/burton_crew/rudmonroe.png" alt="Rud Monroe" class="crew-img">
            <div class="crew-info">
                <h3 class="crew-name">RUD MONROE</h3>
                <p class="crew-subtitulo">El Guardián de la Calma</p>
                <p class="crew-texto">
                    En su silla, Rud trabaja con una precisión que roza lo quirúrgico. Es perfeccionista, meticuloso, 
                    incapaz de dejar un solo pelo fuera de lugar. Sus barbas parecen esculpidas, sus degradados suaves 
                    como una sombra.
                </p>
                <p class="crew-texto">
                    Su serenidad mantiene al equipo coordinado. Es la calma en medio del caos, la mente clara cuando todo se 
                    desordena, el que piensa con lucidez. Él es el punto de equilibrio de la crew.
                </p>
                <a href="reservar.php?categoria=barbería" class="btn-burton">
                    RESERVAR SERVICIO
                </a>
            </div>
        </section>

    </div> 

</div>

</body>
</html>