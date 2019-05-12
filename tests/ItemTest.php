<?php

namespace LLTS;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
  /**
   * @var Item
   */
  protected $item;

  protected function setup(): void
  {
    $this->item = new Item;
  }

  public function testGetDescriptionIsNotEmpty()
  {
    $this->assertNotEmpty($this->item->getDescription());
  }

  public function testIdIsAnInteger()
  {
    $itemChild = new ItemChild;
    $this->assertIsInt($itemChild->getId());
  }

  /**
   * @throws \ReflectionException
   */
  public function testTokenIsAString()
  {
    $reflector = new \ReflectionClass(Item::class);

    $method = $reflector->getMethod("getToken");
    $method->setAccessible(true);

    $this->assertIsString($method->invoke($this->item));
  }

  /**
   * @throws \ReflectionException
   */
  public function testPrefixTokenIsAString()
  {
    $reflector = new \ReflectionClass(Item::class);

    $method = $reflector->getMethod("getPrefixedToken");
    $method->setAccessible(true);

    $this->assertStringStartsWith("example", $method->invokeArgs($this->item, ["example"]));
  }
}
