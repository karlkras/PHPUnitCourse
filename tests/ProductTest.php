<?php

namespace LLTS;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
  /**
   * @throws \ReflectionException
   */
  public function testIdIsAnInteger()
  {
    $product = new Product;

    $reflector = new \ReflectionClass(Product::class);

    $property = $reflector->getProperty("product_id");
    $property->setAccessible(true);

    $this->assertIsInt($property->getValue($product));


  }

}
