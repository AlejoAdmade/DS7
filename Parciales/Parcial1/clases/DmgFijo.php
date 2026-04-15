<?php
require_once "DmgInterface.php";

class DmgFijo implements DmgInterface {
    private int $dmg;

    public function __construct(int $dmg) {
        $this->dmg = $dmg;
    }

    public function calcularDmg(): int {
        return $this->dmg;
    }
}