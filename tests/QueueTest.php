<?php namespace LLTS;

use LLTS\Exceptions\QueueException;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
  protected static $queue;

  protected function setUp(): void
  {
    static::$queue->clear();
  }

  public static function setUpBeforeClass(): void
  {
    static::$queue = new Queue;
  }

  public static function tearDownAfterClass(): void
  {
    static::$queue = null;
  }

  public function testNewQueueIsEmpty()
  {
    $this->assertEquals(0, static::$queue->getCount());
  }


  public function testAnItemIsAddedToTheQueue()
  {
    static::$queue->push("an Item");
    $this->assertEquals(1, static::$queue->getCount());
  }

  public function testAnItemIsRemovedFromTheQueue()
  {
    static::$queue->push('an Item');
    $item = static::$queue->pop();
    $this->assertEquals(0, static::$queue->getCount());
    $this->assertEquals("an Item", $item);
  }

  public function testAnItemIsRemovedFromTheFrontOfTheQueue()
  {
    static::$queue->push('item1');
    static::$queue->push('item2');
    $item = static::$queue->pop();
    $this->assertEquals('item1', $item);
  }

  public function testMaxNumberOrItemsCanBeAdded()
  {
    for($i = 0; $i < Queue::MAX_ITEMS; $i++)
    {
      static::$queue->push($i);
    }

    $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    return static::$queue;

  }

  public function testExceptionThrownWhenAddingAnItemToFullQueue()
  {
    for($i = 0; $i < Queue::MAX_ITEMS; $i++)
    {
      static::$queue->push($i);
    }
    $this->expectException(QueueException::class);
    $this->expectExceptionMessage("Queue is full");
    static::$queue->push("one too many");
  }

}
