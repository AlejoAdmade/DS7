<?php
require_once "GestionColaborador.php";

$colaboradores = [
    new GestionColaborador("Ana Pérez", "001", 1200, "Completo"),
    new GestionColaborador("Carlos Gómez", "002", 800, "Comision", 350),
    new GestionColaborador("Luis Martínez", "003", 750, "Hora", 0, 8, 12.50)
];

foreach ($colaboradores as $c) {
    echo "Nombre: " . $c->getNombre() . " | Salario: $" . $c->calcularSalario() . "<br>";
}