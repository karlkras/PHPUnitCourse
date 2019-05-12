<?php

namespace LLTS;

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
  public function testNameAndTitleIsReturned()
  {
    $person = new DoctorPerson("Krasnowsky");

    $this->assertEquals("Dr. Krasnowsky", $person->getNameAndTitle());

  }

  /**
   * @throws \ReflectionException
   */
  public function testNameAndTitleIsReturnedWithMock()
  {
    $mock = $this->getMockBuilder(AbstractPerson::class)
                  ->setConstructorArgs(['Krasnowsky'])
                  ->getMockForAbstractClass();

    $mock->method('getTitle')
      ->willReturn("Dr.");

    $this->assertEquals("Dr. Krasnowsky", $mock->getNameAndTitle());


  }
}
