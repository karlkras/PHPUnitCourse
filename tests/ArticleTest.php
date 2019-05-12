<?php

use LLTS\Article;


use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
  /**
   * @var Article
   */
  protected $article;

  protected function setup(): void
  {
    $this->article = new Article;
  }

  public function testTitleIsEmptyByDefault()
  {
    $this->assertEmpty($this->article->getTitle());
  }

  public function testSlugIsEmptyWithNoTitle()
  {
    $this->assertSame($this->article->getSlug(), "");
  }

  public function titleProvider()
  {
    $expectedSlug = "this_is_a_test";
    return [
      "Slug Has Spaces Replaced With UnderScores" => ["This is a Test", $expectedSlug],
      "Slug Has White Space Replaced With UnderScores" => ["This is a   \n    Test", $expectedSlug],
      "Slug Cannot Start Or End With Underscores" => [" This is a Test ", $expectedSlug],
      "Slug Does Not Have Any Special Characters" => [" This! ,is! a! Te'st! ", $expectedSlug]
    ];
  }

  /**
   * @dataProvider titleProvider
   * @param $title
   * @param $slug
   */
  public function testSlug($title, $slug)
  {
    $this->article->setTitle($title);
    $this->assertEquals($slug, $this->article->getSlug());
  }
}
