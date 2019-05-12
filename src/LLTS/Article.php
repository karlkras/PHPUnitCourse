<?php namespace LLTS;

use http\Exception\BadMethodCallException;

class Article
{
  /**
   * @var string
   */
  private $title = '';

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  public function getSlug(): string
  {
    return self::processSlug($this->title);
  }

  private static function processSlug($title)
  {
    $slug = $title;
    $slug = preg_replace("/\s+/", "_", $slug);
    $slug = preg_replace("/[^\w]+/", "", $slug);
    return strtolower(trim($slug, "_"));
  }

}