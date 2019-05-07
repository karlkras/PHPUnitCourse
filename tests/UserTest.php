<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

  public function testGetFullName()
  {
    $user = new User;
    $user->firstName = 'Karl';
    $user->lastName = 'Krasnowsky';

    $this->assertEquals("Karl Krasnowsky", $user->getFullName());
  }

  public function testGetFullNameReturnsEmptyByDefault()
  {
    $user = new User;

    $this->assertEquals("", $user->getFullName());
  }
}
