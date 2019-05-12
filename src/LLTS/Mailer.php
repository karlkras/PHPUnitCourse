<?php
namespace LLTS;

use Prophecy\Exception\InvalidArgumentException;

class Mailer
{

  /**
   * @param string $email
   * @param string $message
   * @return bool
   * @throws InvalidArgumentException
   */
  public static function send(string $email, string $message)
  {
    if(empty($email)){
      throw new \InvalidArgumentException;
    }

    echo "Send '$message' to $email";

    return true;
  }

}