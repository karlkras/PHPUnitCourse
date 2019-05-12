<?php namespace LLTS;

/**
 * User
 *
 * An example user class
 */
class User
{

  /**
   * Email address
   * @var string
   */
  public $email;

  /**
   * @var callable
   */
  protected $mailer_callable;

  /**
   * @var mixed
   */
  protected $mailer;


  /**
   * Constructor
   *
   * @param string $email The user's email
   *
   * @return void
   */
  public function __construct(string $email)
  {
    $this->email = $email;
  }

  /**
   * @param callable $mailer_callable
   */
  public function setMailerCallable(callable $mailer_callable): void
  {
    $this->mailer_callable = $mailer_callable;
  }

  /**
   * @param mixed $mailer
   */
  public function setMailer($mailer): void
  {
    $this->mailer = $mailer;
  }

  /**
   * Send the user a message
   *
   * @param string $message The message
   *
   * @return boolean
   */
  public function notify(string $message)
  {
    if(!empty($this->mailer_callable)) {
      echo 'using callable' . PHP_EOL;
      return call_user_func($this->mailer_callable, $this->email, $message);
    } elseif (!empty($this->mailer)) {
      return $this->mailer::send($this->email, $message);
    } else {
      echo 'using raw static Mailer::send call' . PHP_EOL;
      return Mailer::send($this->email, $message);
    }
  }
}
