<!DOCTYPE html>
<html>
<head>
    <title>Formulario GET</title>
</head>
<body>

<h1>Calculadora IMC</h1>

<form action="salida_get.php" method="GET">
    Nombre: <input type="text" name="nombre"><br><br>
    Peso (kg): <input type="number" step="any" name="peso"><br><br>
    Altura (m): <input type="number" step="any" name="altura"><br><br>

    <button type="submit">Calcular</button>
</form>

</body>
</html>