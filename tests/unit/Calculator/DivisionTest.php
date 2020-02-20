<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandsException;

class DivisionTest extends TestCase {

  protected $division;

  public function setUp():void
  {
      $this->division = new Division;
  }

  public function test_divides_given_operands()
  {
    $this->division->setOPerands([100, 2]);
    $this->assertEquals(50, $this->division->calculate());
  }

  public function test_no_operands_given_throws_exception_when_calculating() {
    $this->division->setOperands();
    $this->expectException(NoOperandsException::class);
    $this->division->calculate();
  }

  public function test_remove_by_zero_operands() {
    $this->division->setOperands([100, 2, 0, 25]);
    $this->assertEquals(2, $this->division->calculate());
  }

}
