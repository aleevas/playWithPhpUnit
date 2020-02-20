<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandsException;

class AdditionTest extends TestCase {

  protected $addition;

  public function setUp():void
  {
      $this->addition = new Addition;
  }

  public function test_adds_up_given_operands()
  {
      $this->addition->setOperands([5, 10]);
      $this->assertEquals(15, $this->addition->calculate());
  }

  public function test_no_operands_given_throws_exception_when_calculating()
  {
      $this->addition->setOperands();
      $this->expectException(NoOperandsException::class);
      $this->addition->calculate();
  }

}
