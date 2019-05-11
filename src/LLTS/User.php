<?php
namespace LLTS;

use LLTS\Services\Mailer;


class User
{
  /**
   * First name
   * @var string
   */
  public $firstName;
  /**
   * Last name
   * @var string
   */
  public $lastName;

  /**
   * Email
   * @var string
   */
  public $email;

  /**
   * Mailer Object
   * @var Mailer
   */
  protected $mailer;


  /**
   * Setter for the Mailer object.
   *
   * @param Mailer $mailer
   */
  public function setMailer(Mailer $mailer): void
  {
    $this->mailer = $mailer;
  }

  /**
   * @return string
   */
  public function getFullName() {
    return trim($this->firstName . " " . $this->lastName);
  }

  /**
   * @param $message
   * @return bool
   * @throws \Exception
   */
  public function notify($message)
  {
    return $this->mailer->sendMessage($this->email, $message);
  }
}