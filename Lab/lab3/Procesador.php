<?php

class Procesador {

    public function procesarPOST($data) {
        $nombre = $data['nombre'] ?? '';
        $correo = $data['correo'] ?? '';
        $cedula = $data['cedula'] ?? '';
        $edad = $data['edad'] ?? '';

        return "
        <h2>Datos de Contacto</h2>
        Nombre: $nombre <br>
        Correo: $correo <br>
        Cédula: $cedula <br>
        Edad: $edad <br>
        ";
    }

    public function procesarGET($data) {
        $nombre = $data['nombre'] ?? '';
        $peso = $data['peso'] ?? 0;
        $altura = $data['altura'] ?? 0;

        $imc = 0;
        if ($altura > 0) {
            $imc = $peso / ($altura * $altura);
        }

        return "
        <h2>Resultado IMC</h2>
        Nombre: $nombre <br>
        Peso: $peso kg <br>
        Altura: $altura m <br>
        IMC: " . number_format($imc, 2) . " <br>
        ";
    }
}