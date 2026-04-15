<?php
require_once "DmgInterface.php";

class Habilidad {
    private string $nombre;
    private int $coste;
    private DmgInterface $tipoDmg;

    public function __construct(string $nombre, int $coste, DmgInterface $tipoDmg) {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->tipoDmg = $tipoDmg;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCoste(): int {
        return $this->coste;
    }

    public function ejecutar(): int {
        return $this->tipoDmg->calcularDmg();
    }
}