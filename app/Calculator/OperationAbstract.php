<?php
namespace App\Calculator;

abstract class OperationAbstract {
  protected $operands;

  public function setOperands(array $operands = [])
  {
    return $this->operands = $operands;
  }

}
