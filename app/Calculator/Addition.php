<?php

namespace App\Calculator;

class Addition {

    protected $operands;

    public function setOperands(array $operands)
    {
        return $this->operands = $operands;
    }

    public function calculate()
    {
        return array_sum($this->operands);
    }

}