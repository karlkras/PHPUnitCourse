<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
  public function testTwoAndTwoEqualsFour()
  {
    $this->assertEquals(4, 2 + 2);
  }


}
