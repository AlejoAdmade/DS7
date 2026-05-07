<?php

// Eliminar cookie colocando una fecha de expiración en el pasado
setcookie("nombre_usuario", "", time() - 3600, "/");

// Redirigir al formulario inicial
header("Location: formulario.php");
exit();

?>