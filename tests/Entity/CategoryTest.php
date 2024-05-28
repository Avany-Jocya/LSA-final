<?php

namespace App\Tests\Entity;

use App\Entity\Category;
use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testGetSetId()
    {
        $category = new Category();
        $this->assertNull($category->getId());
    }

    public function testGetSetName()
    {
        $category = new Category();
        $name = "Test Category";
        $category->setName($name);
        $this->assertEquals($name, $category->getName());
    }

    public function testGetSetSlug()
    {
        $category = new Category();
        $slug = "test-category";
        $category->setSlug($slug);
        $this->assertEquals($slug, $category->getSlug());
    }

    public function testGetSetColor()
    {
        $category = new Category();
        $color = "#FFFFFF";
        $category->setColor($color);
        $this->assertEquals($color, $category->getColor());
    }

    public function testAddRemoveArticle()
    {
        $category = new Category();
        $article = $this->createMock(Article::class);

        $this->assertCount(0, $category->getArticles());

        $category->addArticle($article);
        $this->assertCount(1, $category->getArticles());
        $this->assertTrue($category->getArticles()->contains($article));

        $category->removeArticle($article);
        $this->assertCount(0, $category->getArticles());
        $this->assertFalse($category->getArticles()->contains($article));
    }

    public function testToString()
    {
        $category = new Category();
        $name = "Test Category";
        $category->setName($name);
        $this->assertEquals($name, $category->__toString());
    }
}
