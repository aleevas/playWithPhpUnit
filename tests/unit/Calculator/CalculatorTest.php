<?php

use App\Calculator\Division;
use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Calculator;
use App\Calculator\Exceptions\NoOperandsException;

class CalculatorTest extends TestCase {

  protected $calculator;
  protected $division;
  protected $addition;
  protected $addition2;

  public function setUp():void
  {
    $this->calculator = new Calculator;
    $this->division = new Division;
    $this->addition = new Addition;
  }

  public function test_can_set_single_operation()
  {
    $this->addition->setOperands([5, 10]);
    $this->calculator->setOperation($this->addition);

    $this->assertCount(1, $this->calculator->getOperations());
  }

  public function test_can_set_multiple_operations()
  {
    $this->addition->setOperands([5, 10]);
    $this->division->setOperands([5, 15]);
    $this->calculator->setOperations([$this->addition,  $this->division]);

    $this->assertCount(2, $this->calculator->getOperations());
  }

  public function test_are_ignored_if_not_instance_of_operation_interface()
  {
    $this->addition->setOperands([5, 15]);
    $this->calculator->setOperations([$this->addition, 'not_operation_interface']);

    $this->assertCount(1, $this->calculator->getOperations());
  }

  public function test_can_calculate_one_result()
  {
    $this->addition->setOperands([5, 15]);
    $this->calculator->setOperation($this->addition);

    $this->assertEquals(20, $this->calculator->calculate());
  }

  public function test_can_calculate_multiple_result()
  {
    $this->addition->setOperands([5, 15]);
    $this->division->setOperands([15, 5]);

    $this->calculator->setOperations([$this->addition, $this->division]);

    $this->assertIsArray($this->calculator->calculate());
    $this->assertEquals(20,$this->calculator->calculate()[0]);
    $this->assertEquals(3,$this->calculator->calculate()[1]);
  }

}
