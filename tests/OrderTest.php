<?php

use LLTS\Order;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderTest extends MockeryTestCase
{

  /**
   * @throws \ReflectionException
   */
  public function testOrderIsProcessed()
  {
    $gateway = $this->getMockBuilder('PaymentGateway')
                    ->setMethods(['charge'])
                    ->getMock();

    $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

    $order = new Order($gateway);

    $order->amount = 200;

    $this->assertTrue($order->process());

  }

  public function testOrderIsProcessedWithMockery()
  {

    $gateway = Mockery::mock('PaymentGateway');

    $gateway->shouldReceive('charge')
      ->once()
      ->with(200)
      ->andReturn(true);

    $order = new Order($gateway);

    $order->amount = 200;

    $this->assertTrue($order->process());

  }
}
