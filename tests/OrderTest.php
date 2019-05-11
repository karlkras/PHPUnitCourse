<?php

use LLTS\Order;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderTest extends MockeryTestCase
{

  public function testOrderIsProcessedWithMockery()
  {
    $order = new Order(3, 1.99);

    $this->assertEquals(5.97, $order->getAmount());

    $gateway = Mockery::mock('PaymentGateway');
    $gateway->shouldReceive('charge')
      ->once()
      ->with($order->getAmount())
      ->andReturn(true);

    $order->process($gateway);
  }

  public function testOrderIsProcessedWithASpy()
  {
    $order = new Order(3, 1.99);

    $this->assertEquals(5.97, $order->getAmount());

    $gateway_spy = Mockery::spy('PaymentGateway');

    $order->process($gateway_spy);

    $gateway_spy->shouldHaveReceived('charge')
      ->once()
      ->with($order->getAmount());
  }


}
