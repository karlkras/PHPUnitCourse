<?php


namespace LLTS;


class Product
{
  /**
   * @var integer
   */
  protected $product_id;

  public function __construct()
  {
    $this->product_id = rand();
  }

}