<?php

namespace LLTS;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery;

class UserTest extends MockeryTestCase
{
  /**
   * @var User
   */
  protected $user;

  public function setUp(): void
  {
    $this->user = new User('karlkras@foo.com');
  }

  public function testNotifyReturnsTrueWithRawStaticMailer()
  {
    $this->assertTrue($this->user->notify("Hey there hi there ho there!"));
  }
  /**
   * @throws \ReflectionException
   */
  public function testNotifyReturnsTrueWithCallable()
  {
    $this->user->setMailerCallable(function () {
      echo 'mocked';
      return true;
    });

    $this->assertTrue($this->user->notify("Hey there hi there ho there!"));

  }

  public function testNotifyReturnsTrueWithMockery()
  {
    $mock = Mockery::mock('alias:Mailer');

    $mock->shouldReceive('send')
      ->once()
      ->with($this->user->email, 'Hey there hi there ho there!')
      ->andReturn(true);
    //$this->user->setMailer($mock);

    $this->assertTrue($this->user->notify("Hey there hi there ho there!"));
  }

}