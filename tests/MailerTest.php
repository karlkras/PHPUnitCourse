<?php

namespace LLTS;

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
  public function testSendMessageReturnsTrue()
  {
    $mailer = new Mailer;
    $this->assertTrue($mailer->send("karl@foo.com", "Here's my message"));
  }

  public function testSendMessageThrowsExceptionIfEmailIsEmpty()
  {
    $mailer = new Mailer;
    $this->expectException(\InvalidArgumentException::class);

    $mailer->send("", "");


  }


}
