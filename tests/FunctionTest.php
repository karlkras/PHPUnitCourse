<?php

use PHPUnit\Framework\TestCase;

use LLTS\Utils\HelperFunctions;

class FunctionTest extends TestCase
{
  public function testAddReturnsTheCorrectSum()
  {
    $this->assertEquals(4, HelperFunctions::add(2, 2));
    $this->assertEquals(8, HelperFunctions::add(6, 2));
  }

  public function testAddDoesNotReturnTheIncorrectSum()
  {
    $this->assertNotEquals(5, HelperFunctions::add(1, 1));
  }
}
