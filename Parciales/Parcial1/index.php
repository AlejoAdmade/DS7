<?php

require_once "clases/Personaje.php";
require_once "clases/Habilidad.php";
require_once "clases/DmgFijo.php";
require_once "clases/DmgAleatorio.php";
require_once "clases/DmgInterface.php";
require_once "clases/Excepciones.php";

session_start();

if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['init'])) {

    $gandalf = new Personaje("Gandalf", 100, 75);
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

if (isset($_POST['accion']) && $_SESSION['orco']->estaVivo()) {
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

        header("Location: index.php");
        exit;

    } catch (Exception $e) {
        $_SESSION['log'][] = "Error: " . $e->getMessage();
    }
}

$vidaG = $_SESSION['gandalf']->getVida();
$vidaO = $_SESSION['orco']->getVida();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RPG</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h1>⚔️ Combate RPG</h1>

<div class="cards">

    <div class="card">
        <h2>🧙 Gandalf</h2>
        <div class="barra">
            <div class="vida" style="width: <?= $vidaG ?>%"></div>
        </div>
        <p>Vida: <?= $vidaG ?></p>

        <form method="POST">
            <button name="accion" value="fuego" <?= !$vidaO ? 'disabled' : '' ?>>🔥 Fuego</button>
            <button name="accion" value="critico" <?= !$vidaO ? 'disabled' : '' ?>>⚡ Crítico</button>
        </form>
    </div>

    <div class="card">
        <h2>👹 Orco</h2>
        <div class="barra">
            <div class="vida" style="width: <?= $vidaO ?>%"></div>
        </div>
        <p>Vida: <?= $vidaO ?></p>
    </div>

</div>

<div class="log">
    <h3>Combate</h3>
    <?php
    foreach ($_SESSION['log'] as $l) {
        echo $l . "<br>";
    }
    ?>
</div>

<form method="POST">
    <button name="reset">Reiniciar</button>
</form>

</body>
</html>