<?php namespace LLTS;

use PHPUnit\Framework\TestCase;
use LLTS\Services\Mailer;


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


  public function testNotifyMailer()
  {
    $user = new User;

    /** @var Mailer $mock_mailer */
    $mock_mailer = $this->createMock(Mailer::class);
    $mock_mailer->expects($this->once())
      ->method('sendMessage')
      ->with($this->equalTo('karlkras@foobar.com'),
        $this->equalTo("This is a message"))
      ->willReturn(true);


    $user->setMailer($mock_mailer);
    $user->email = 'karlkras@foobar.com';
    $this->assertTrue($user->notify("This is a message"));

  }

  public function testCannotNotifyUserWithNoEmail()
  {
    $user = new User;
    $mock_mailer = $this->getMockBuilder(Mailer::class)
      ->setMethods(null)
      ->getMock();


    $user->setMailer($mock_mailer);
    $this->expectException(\Exception::class);
    $user->notify('this is a message');
  }
}
