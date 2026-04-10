<?php
session_start();

require_once "clases/Personaje.php";
require_once "clases/DmgFijo.php";
require_once "clases/DmgAleatorio.php";

// RESET
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
}

// Inicializar juego
if (!isset($_SESSION['init'])) {

    $gandalf = new Personaje("Gandalf", 100, 100);
    $orco = new Personaje("Orco", 120, 50);

    $fuego = new Habilidad("Bola de Fuego", 20, new DmgFijo(50));
    $critico = new Habilidad("Rayo Crítico", 30, new DmgAleatorio(60, 90));

    $gandalf->aprenderHabilidad($fuego);
    $gandalf->aprenderHabilidad($critico);

    $_SESSION['gandalf'] = $gandalf;
    $_SESSION['orco'] = $orco;
    $_SESSION['log'] = [];
    $_SESSION['init'] = true;
}

// Acción combate
if (isset($_POST['accion'])) {
    try {
        $g = $_SESSION['gandalf'];
        $o = $_SESSION['orco'];

        ob_start();

        if ($_POST['accion'] == "fuego") {
            $g->usarHabilidad("Bola de Fuego", $o);
        }

        if ($_POST['accion'] == "critico") {
            $g->usarHabilidad("Rayo Crítico", $o);
        }

        $output = ob_get_clean();
        $_SESSION['log'][] = $output;

        $_SESSION['gandalf'] = $g;
        $_SESSION['orco'] = $o;

    } catch (Exception $e) {
        $_SESSION['log'][] = "Error: " . $e->getMessage();
    }
}

// Obtener vida (hack simple para barra)
function getVida($personaje) {
    $ref = new ReflectionClass($personaje);
    $prop = $ref->getProperty("vida");
    $prop->setAccessible(true);
    return $prop->getValue($personaje);
}

$vidaG = getVida($_SESSION['gandalf']);
$vidaO = getVida($_SESSION['orco']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RPG Combate</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">
    <h1>⚔️ Sistema de Combate RPG</h1>

    <div class="cards">

        <!-- Gandalf -->
        <div class="card">
            <h2>🧙 Gandalf</h2>
            <div class="barra">
                <div class="vida" style="width: <?= $vidaG ?>%"></div>
            </div>
            <p>Vida: <?= $vidaG ?></p>

            <form method="POST">
                <button name="accion" value="fuego">🔥 Bola de Fuego</button>
                <button name="accion" value="critico">⚡ Rayo Crítico</button>
            </form>
        </div>

        <!-- Orco -->
        <div class="card">
            <h2>👹 Orco</h2>
            <div class="barra">
                <div class="vida" style="width: <?= $vidaO ?>%"></div>
            </div>
            <p>Vida: <?= $vidaO ?></p>
        </div>

    </div>

    <!-- Log -->
    <div class="log">
        <h3>📜 Combate</h3>
        <?php
        foreach ($_SESSION['log'] as $linea) {
            echo $linea . "<br>";
        }
        ?>
    </div>

    <!-- Reset -->
    <form method="POST">
        <button name="reset">🔄 Reiniciar</button>
    </form>

</div>

</body>
</html>