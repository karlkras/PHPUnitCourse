<?php

namespace LLTS;
/**
 * Order
 *
 * An example order class
 */
class Order
{
  /**
   * Quantity
   * @var int
   */
  private $quantity;

  /**
   * Unit price
   * @var float
   */
  private $unit_price;

  /**
   * Total amount
   * @var float
   */
  private $amount;

  /**
   * Constructor
   *
   * @param int $quantity Quantity
   * @param float $unit_price Unit price
   *
   * @return void
   */
  public function __construct(int $quantity, float $unit_price)
  {
    $this->quantity = $quantity;
    $this->unit_price = $unit_price;

    $this->amount = $quantity * $unit_price;
  }

  public function getAmount() {
    return $this->amount;
  }

  /**
   * Charge the total amount
   *
   * @param PaymentGateway $gateway Payment gateway object
   *
   * @return void
   */
  public function process(\PaymentGateway $gateway)
  {
    $gateway->charge($this->amount);
  }
}
