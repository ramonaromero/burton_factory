<?php
session_start();


$seccion = $_GET['seccion'] ?? '';

$articulos = [

    "botanica" => [
        "titulo_seccion" => "Botánica en Marcha",
        "autor" => "Fiona Shelby: Departamento de Alquimia y Cuidado Consciente",
        "articulos" => [
            [
                "titulo" => "Elixires y Vapor",
                "imagen" => "elixiresyvapor.png",
                "contenido" => "
                <p>En los engranajes de Burton Factory, no todo es metal y precisión mecánica. Para que una máquina funcione eternamente, 
                necesita el aceite adecuado y para que tu cabello soporte el ritmo de la ciudad, necesita el poder de la tierra. Muchos me preguntáis en el salón: 
                Fiona, ¿cuál es el secreto de tus fórmulas?. La respuesta está en la naturaleza. Aquí, en mi rincón de la fábrica, 
                destilamos la calma para combatir el caos exterior.</p>
                <h4>Tres elixires que debes conocer:</h4>
                <ul>
                    <li><strong>Romero:</strong> Es el aceite de la claridad.Estimula la circulación como el carbón enciende una caldera. 
                    Si notas que tu maquinaria se debilita, el romero es tu mejor aliado.</li>
                    <li><strong>Jojoba:</strong> Su estructura es casi idéntica al sebo natural. Hidrata sin engrasar, sellando la cutícula 
                    como un barniz protector frente a la polución de la ciudad.</li>
                    <li><strong>Lavanda de la Región:</strong> No solo calma el cabello, calma el alma. En Burton Factory, creemos que un 
                    servicio de peluquería debe ser un ajuste de sistema completo: cuerpo y mente.</li>
                </ul>
                "
            ],
            [
                "titulo" => "Desintoxicación del Sistema",
                "imagen" => "ritualcarbonbarro.png",
                "contenido" => "
                <p>Incluso la máquina mejor calibrada acumula residuos que entorpecen su funcionamiento. La polución, los productos pesados y 
                el estrés actúan como hollín en tus engranajes. En mi rincón de la fábrica, utilizamos los elementos más puros de la tierra 
                para resetear tu cuero cabelludo y dejarlo como nuevo.</p>
                <h4>Tres Elixires Purificantes:</h4>
                <ul>
                    <li><strong>Arcilla Volcánica:</strong> Absorbe las impurezas y el exceso de sebo como una esponja, 
                    dejando la raíz libre de obstrucciones.</li>
                    <li><strong>Infusión de Menta:</strong> Despierta los folículos con una descarga de frescor que activa la microcirculación, 
                    como un ventilador en una sala de máquinas calurosa.</li>
                    <li><strong>Aceite de Argán (el lubricante maestro):</strong> tras la limpieza profunda, devolvemos la elasticidad a la fibra para que
                    cada hebra de cabello deslice sin fricción.</li>
                </ul>
                "
            ]
        ]
    ],

    "gabineterud" => [
        "titulo_seccion" => "El Gabinete de Rud",
        "autor" => "Rud Monroe: Guardián de la Calma",
        "articulos" => [
            [
                "titulo" => "La Calma en el Filo",
                "imagen" => "calmafilo.png",
                "contenido" => "<p>En Burton Factory, el tiempo no se mide en minutos, sino en la precisión de un engranaje bien afeitado. 
                Mi rincón, el área de barbería, es el refugio donde el ruido del mundo exterior se detiene para dar paso al ritual. 
                Muchos caballeros entran buscando un corte, pero lo que realmente necesitan es un ajuste de sistema. 
                La barba no es solo vello facial, es la armadura que presenta al mundo nuestra actitud.</p>
               <h4>Los tres ajustes de mantenimiento:</h4>
                <ul>
                    <li><strong>La preparación de la matriz:</strong> Un buen afeitado comienza con calor. El vapor abre los poros como se expande 
                    el metal en la forja, preparando la piel para que el acero deslice sin fricción.</li>
                    <li><strong>Calibración de acero:</strong> requiere pulso de relojero. Un grado de desviación es la diferencia entre la perfección 
                    y el caos. La calma mental es mi herramienta principal.</li>
                    <li><strong>Sellado y protección:</strong> Al terminar, el frío cierra el ciclo. Un bálsamo de la estación de Fiona 
                    sella la piel, asegurando que el acabado sea duradero y resistente.</li>
                </ul>
                "
            ],
            [
                "titulo" => "La Geometría de la Barba",
                "imagen" => "geometriabarba.png",
                "contenido" => "<p>Una barba mal perfilada es un plano mal dibujado. En El Gabinete, analizamos las sombras que proyecta tu 
                mandíbula para crear una armadura que potencie tus rasgos. No cortamos pelo, esculpimos autoridad. La clave está en saber 
                dónde termina el hombre y dónde empieza la leyenda.</p>
                <h4>Los tres ajustes de diseño:</h4>
                <ul>
                    <li><strong>La línea de flotación:</strong> Definir el cuello con precisión quirúrgica. Una línea demasiado 
                    alta desequilibra el rostro; una demasiado baja genera pesadez.</li>
                    <li><strong>Degradado de intensidad:</strong> Crear una transición suave desde las patillas para que la barba 
                    se integre orgánicamente con el engranaje del peinado.</li>
                    <li><strong>Hidratación de alta resistencia:</strong> Una barba seca es quebradiza y difícil de domar. 
                    El bálsamo es el aceite que permite que el vello sea dócil ante el peine.</li>
                </ul>
                "
            ]
        ]
    ],

    "cromatica" => [
        "titulo_seccion" => "Cromática Profunda",
        "autor" => "S. Cutterwald: Maestro del Color",
        "articulos" => [
            [
                "titulo" => "El Alma tras el Pigmento",
                "imagen" => "almapigmento.png",
                "contenido" => "<p>Imagina que tu imagen es un engranaje y el color, el aceite que lo hace brillar. En mi sección del Boletín, 
                no seguimos corrientes que se desgastan, creamos matices blindados contra el tiempo. Buscamos esa vibración cromática que solo 
                te pertenece a tí, porque en esta fábrica, el alma se proyecta a través del pigmento.</p>
                <h4>Interpretando el Espectro:</h4>
                <ul>
                    <li><strong>Cobrizos industriales:</strong> Para las almas que arden con energía propia. Son colores que exigen atención 
                    y reflejan una fuerza imparable.</li>
                    <li><strong>Negros de ébano y acero:</strong> Elegancia pura, profundidad y misterio. Un marco perfecto para rostros que 
                    buscan autoridad y calma.</li>
                    <li><strong>Tonos arena y tierra:</strong> La conexión con lo natural. Suavizan las facciones y aportan una luminosidad 
                    que parece nacer del interior.</li>
                </ul>
                "
            ],
            [
                "titulo" => "Blindaje del Tono",
                "imagen" => "blindajetono.png",
                "contenido" => "<p>El mayor enemigo de un color vibrante es el desgaste ambiental. En Burton Factory, tratamos el pigmento como 
                un metal precioso que debe ser protegido. Un color que se apaga es como una máquina que se oxida: pierde su propósito. Aquí te 
                enseñamos a mantener el color de tu imagen siempre al máximo octanaje. </p>
                <h4>Protocolo de protección:</h4>
                <ul>
                    <li><strong>Lavado criogénico:</strong> El agua fría es el mejor aliado para sellar la cutícula y atrapar el pigmento, 
                    evitando que la energía del color se escape por el desagüe.</li>
                    <li><strong>Filtros de interferencia:</strong> Uso de protectores térmicos y solares que actúan como un barniz frente a 
                    los rayos UV, los principales agentes de la corrosión cromática.</li>
                    <li><strong>Recarga de partículas:</strong> No esperes a que el tono desaparezca. Los champús con pigmento actúan como 
                    pequeñas piezas de repuesto que mantienen la maquinaria brillante entre visitas.</li>
                </ul>
                "
            ]
        ]
    ],

    "geometria" => [
        "titulo_seccion" => "Geometría Viva",
        "autor" => "Emma Pettigrew: Maestra del Corte",
        "articulos" => [
            [
                "titulo" => "Cortes con Intención",
                "imagen" => "cortesintencion.png",
                "contenido" => "<p>Mi estación es La Forja, el lugar donde las ideas abstractas toman una forma física y sólida. Un buen corte 
                no es el que queda bien al salir del salón, sino el que mantiene su estructura semana tras semana. Mi técnica combina la firmeza 
                del trazo con la intuición de lo que cada rostro necesita para brillar.</p>
                <h4>Los pilares de la estructura:</h4>
                <ul>
                    <li><strong>La geometría del rostro:</strong> Cada ángulo de tu cara es una coordenada. Mi trabajo es encontrar la línea de 
                    corte que equilibre tus facciones y potencie tu fuerza natural.</li>
                    <li><strong>Movimiento y resistencia:</strong> Un corte debe tener vida. Uso técnicas que permiten que el cabello se mueva con 
                    libertad pero siempre vuelva a su sitio, como un muelle perfectamente calibrado.</li>
                    <li><strong>Acabado con carácter:</strong> No me conformo con lo convencional. Si buscas un cambio que inspire respeto y 
                    seguridad, estás en la estación adecuada.</li>
                </ul>
                "
            ],
            [
                "titulo" => "Arquitectura del Volumen",
                "imagen" => "arquitecturavolumen.png",
                "contenido" => "<p>La estructura de un buen diseño no solo se ve, se siente. En La Forja, entendemos que el volumen no es cuestión 
                de azar, sino de una arquitectura precisa en las raíces. Si la base falla, el engranaje se detiene. Trabajamos el cabello para que 
                desafíe la gravedad sin perder la naturalidad del movimiento.</p>
                <h4>Tres leyes de soporte:</h4>
                <ul>
                    <li><strong>El ángulo de elevación:</strong> Cortar en la dirección opuesta al crecimiento para crear un andamio natural que 
                    sostenga el resto del cabello.</li>
                    <li><strong>Texturizado estratégico:</strong> No se trata de quitar cantidad, sino de crear canales de aire que permitan que 
                    el cabello respire y gane ligereza.</li>
                    <li><strong>El sellado térmico:</strong> El uso del calor controlado para fraguar la forma, asegurando que el volumen resista 
                    la presión del día a día. </li>
                </ul>
                "
            ]
        ]
    ],

    "destellos" => [
        "titulo_seccion" => "Destellos de Maisie",
        "autor" => "Maisie Holloway: Estilista Creativa",
        "articulos" => [
            [
                "titulo" => "Estilo Diario y Ocasiones",
                "imagen" => "estilosdiarios.png",
                "contenido" => "<p>¡Hola habitantes de Burton! Mi misión en el Boletín es traeros la frescura. Porque sabemos que la vida no es 
                siempre una gala, pero eso no significa que tu estilo deba ser aburrido. La creatividad es el lubricante que hace que el día a día 
                sea mucho más divertido.</p>
                <h4>Ideas de encendido rápido:</h4>
                <ul>
                    <li><strong>El look de diario eficiente:</strong> Peinados que parecen complejos pero se resuelven en cinco minutos. 
                    Ideales para cuando la caldera de tu rutina está a máxima presión. </li>
                    <li><strong>Sofisticación mecánica:</strong> Para esos eventos donde quieres destacar. Recogidos con un toque rebelde, 
                    trenzados que parecen engranajes de seda... ¡el límite es tu imaginación!</li>
                    <li><strong>Naturalidad ante todo:</strong> Mi secreto es que te sientas tú misma. No disfrazamos a nadie; simplemente 
                    sacamos la luz que ya llevas dentro.</li>
                </ul>
                "
            ],
            [
                "titulo" => "Accesorios de Presión",
                "imagen" => "accesoriospresion.png",
                "contenido" => "<p>A veces la maquinaria solo necesita un ajuste para cambiar por completo su rendimiento. En el día a día, los 
                accesorios no son adornos, son piezas clave que terminan de encajar con tu estilo. Vamos a darle un giro a lo convencional usando 
                elementos que parecen rescatados de la propia fábrica.</p>
                <h4>Guía de ajustes rápidos:</h4>
                <ul>
                    <li><strong> Horquillado industrial:</strong> Deja de esconder las horquillas. Úsalas en paralelo o cruzadas creando 
                    formas geométricas; que se vea la estructura del peinado. </li>
                    <li><strong>Pañuelos de vapor:</strong> Un nudo bien ejecutado puede salvar un mal día. Aporta color y control 
                    en menos de un minuto. </li>
                    <li><strong>Textura mate vs. brillo:</strong> Juega con los acabados. Un recogido desordenado con un pasador 
                    pulido crea un contraste mecánico irresistible.</li>
                </ul>
                "
            ]
        ]
    ]

];

if (!array_key_exists($seccion, $articulos)) {
    echo "Sección no encontrada.";
    exit;
}

$datos = $articulos[$seccion];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title><?php echo $datos['titulo_seccion']; ?></title>
<link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<section class="crew-section">

    <div class="crew-header">
        <a href="../paginas/home.php" class="crew-logo-link">
    <img src="../assets/img/logo.png" 
         alt="Burton Factory Logo" 
         class="crew-logo">
</a>
        <h2 class="crew-title"><?php echo $datos['titulo_seccion']; ?></h2>
    </div>

    <p class="section-intro"><?php echo $datos['autor']; ?></p>

</section>

<section class="articulos-container">

<?php foreach($datos['articulos'] as $articulo): ?>

    <div class="articulo-bloque">

        <img src="../assets/img/blog/articulos/<?php echo $articulo['imagen']; ?>" class="articulo-img">

       <div class="articulo-contenido">
    <h3><?php echo $articulo['titulo']; ?></h3>
    <?php echo $articulo['contenido']; ?>

    <a href="boletinburtoniano.php" class="btn-burton btn-volver">
        ← Volver al Boletín
    </a>
</div>

    </div>

<?php endforeach; ?>

</section>

</body>
</html>