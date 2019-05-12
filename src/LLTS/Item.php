<?php namespace LLTS;


class Item
{
  public function getDescription()
  {
    return $this->getId() . $this->getToken();
  }

  protected function getId()
  {
    return rand();
  }

  private function getToken()
  {
    return uniqid();
  }

  private function getPrefixedToken(string $prefix) {
    return uniqid($prefix);
  }
}