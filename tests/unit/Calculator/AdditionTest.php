<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;

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

}
