<?php
abstract class Colaborador {
    protected string $nombre;
    protected string $identificacion;
    private float $salarioBase;

    public function __construct($nombre, $identificacion, $salarioBase) {
        $this->nombre = $nombre;
        $this->identificacion = $identificacion;
        $this->salarioBase = $salarioBase;
    }

    protected function getSalarioBase(): float {
        return $this->salarioBase;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    abstract public function calcularSalario(): float;
}