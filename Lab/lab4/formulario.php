<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Nombre</title>
</head>
<body>

    <h2>Ingrese su nombre</h2>

    <form action="guardar_cookie.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <br><br>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>