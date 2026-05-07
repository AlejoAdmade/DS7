<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
</head>
<body>

    <?php
    if (isset($_COOKIE["nombre_usuario"])) {
        echo "<h2>Bienvenido, " . $_COOKIE["nombre_usuario"] . "</h2>";
        echo "<p>Tu nombre está guardado en una cookie.</p>";
        echo '<a href="salir.php">Salir</a>';
    } else {
        echo "<h2>No se ha ingresado el nombre.</h2>";
        echo "<p>Debes ingresar tu nombre primero.</p>";
        echo '<a href="formulario.php">Volver al formulario</a>';
    }
    ?>

</body>
</html>