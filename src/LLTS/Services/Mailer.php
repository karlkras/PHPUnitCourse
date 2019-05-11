<?php
namespace LLTS\Services;

class Mailer
{
  /**
   * @param $email
   * @param $message
   * @return bool
   * @throws \Exception
   */
  public function sendMessage($email, $message)
  {
    if(empty($email)) {
      throw new \Exception;
    }
    // use mail() or PHPMailer for example
    sleep(3);
    echo "send '$message' to '$email'";

    return true;
  }
}