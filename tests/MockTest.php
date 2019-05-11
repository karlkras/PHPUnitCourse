<?php

use PHPUnit\Framework\TestCase;
use LLTS\Services\Mailer;

class MockTest extends TestCase
{
  /**
   * @throws ReflectionException
   */
  public function testMock()
  {
    $mock = $this->createMock(Mailer::class);
    $mock->method('sendMessage')->willReturn(true);
    $result = $mock->sendMessage('karlkras@foobar.com', 'Hey man');
    $this->assertTrue($result);
  }
}
