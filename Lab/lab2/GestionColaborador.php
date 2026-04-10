<?php
require_once "Colaborador.php";

class GestionColaborador extends Colaborador {
    private string $tipo;
    private float $extra; 
    private int $horas;
    private float $precioHora;

    public function __construct($nombre, $id, $base, $tipo, $extra = 0, $horas = 0, $precioHora = 0) {
        parent::__construct($nombre, $id, $base);
        $this->tipo = $tipo;
        $this->extra = $extra;
        $this->horas = $horas;
        $this->precioHora = $precioHora;
    }

    public function calcularSalario(): float {
        switch ($this->tipo) {
            case 'Completo':
                return $this->getSalarioBase();
            case 'Comision':
                return $this->getSalarioBase() + $this->extra;
            case 'Hora':
                return $this->getSalarioBase() + ($this->horas * $this->precioHora);
            default:
                return 0;
        }
    }
}