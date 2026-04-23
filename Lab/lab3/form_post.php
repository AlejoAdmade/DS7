<!DOCTYPE html>
<html>
<head>
    <title>Formulario POST</title>
</head>
<body>

<h1>Registro de Contacto</h1>

<form action="salida_post.php" method="POST">
    Nombre: <input type="text" name="nombre"><br><br>
    Correo: <input type="email" name="correo"><br><br>
    Cédula: <input type="text" name="cedula"><br><br>
    Edad: <input type="number" name="edad"><br><br>

    <button type="submit">Enviar</button>
</form>

</body>
</html>