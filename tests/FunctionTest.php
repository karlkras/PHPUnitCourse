<?php

require 'src/functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
  public function testAddReturnsTheCorrectSum()
  {
    $this->assertEquals(4, add(2, 2));
    $this->assertEquals(8, add(6, 2));
  }

  public function testAddDoesNotReturnTheIncorrectSum()
  {
    $this->assertNotEquals(5, add(1, 1));
  }
}
