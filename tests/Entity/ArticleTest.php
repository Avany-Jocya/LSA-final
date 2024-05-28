<?php

namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Media;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testTitle()
    {
        $article = new Article();
        $title = "Sample Title";

        $article->setTitle($title);
        $this->assertEquals($title, $article->getTitle());
    }

    public function testSlug()
    {
        $article = new Article();
        $slug = "sample-title";

        $article->setSlug($slug);
        $this->assertEquals($slug, $article->getSlug());
    }

    public function testContent()
    {
        $article = new Article();
        $content = "This is a sample content.";

        $article->setContent($content);
        $this->assertEquals($content, $article->getContent());
    }

    public function testFeaturedText()
    {
        $article = new Article();
        $featuredText = "Sample featured text";

        $article->setFeaturedText($featuredText);
        $this->assertEquals($featuredText, $article->getFeaturedText());
    }

    public function testCreatedAt()
    {
        $article = new Article();
        $createdAt = new \DateTime();

        $article->setCreatedAt($createdAt);
        $this->assertEquals($createdAt, $article->getCreatedAt());
    }

    public function testUpdatedAt()
    {
        $article = new Article();
        $updatedAt = new \DateTime();

        $article->setUpdatedAt($updatedAt);
        $this->assertEquals($updatedAt, $article->getUpdatedAt());
    }

    public function testCategories()
    {
        $article = new Article();
        $category = new Category();

        $article->addCategory($category);
        $this->assertTrue($article->getCategories()->contains($category));

        $article->removeCategory($category);
        $this->assertFalse($article->getCategories()->contains($category));
    }

}

