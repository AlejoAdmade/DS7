<?php

if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

    $nombre = $_POST["nombre"];

    // Crear cookie válida por 5 minutos
    setcookie("nombre_usuario", $nombre, time() + (60 * 5), "/");

    // Redirigir a la página de bienvenida
    header("Location: bienvenida.php");
    exit();

} else {

    // Si no se envió nombre, regresar al formulario
    header("Location: formulario.php");
    exit();
}

?>