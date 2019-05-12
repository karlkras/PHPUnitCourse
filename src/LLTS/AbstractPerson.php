<?php


namespace LLTS;


abstract class AbstractPerson
{

  /**
   * @var string
   */
  protected $lastName;

  public function __construct(string $lastName)
  {
    $this->lastName = $lastName;
  }

  /**
   * @return string
   */
  abstract protected function getTitle();

  public function getNameAndTitle()
  {
    return $this->getTitle() . " " . $this->lastName;
  }

}