<?php
require_once "Procesador.php";

$procesador = new Procesador();

echo $procesador->procesarPOST($_POST);

echo "<hr><h3>Datos del Servidor</h3>";

echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>";
echo "SERVER_NAME: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "QUERY_STRING: " . $_SERVER['QUERY_STRING'] . "<br>";
?>