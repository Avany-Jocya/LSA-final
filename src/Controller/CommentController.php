<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CommentController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepo,
        private CommentRepository $commentRepo,
       // private CommentService    $commentService
    )
    {
    }

    #[Route('/ajax/comments', name: 'comment_add', methods: ['POST'])]
    public function add(Request $request,ArticleRepository $articleRepo): Response
    {
        $commentData = $request->request->all('comment');

        if(!$this->isCsrfTokenValid('comment_add',$commentData['_token'])) {
            return $this->json([
                'code'=>'INVALID_CSRF_TOKEN'
            ], Response::HTTP_BAD_REQUEST);
        }
        $article = $articleRepo->findOneBy((['id'=> $commentData['article']]));
        if (!$article) {
            return $this->json([
                'code' => 'ARTICLE_NOT_FOUND'
            ], Response ::HTTP_BAD_REQUEST);
        }

        return $this->render('comment/index', [
            'controller_name'=>'CommentController'
        ]);
    }
}
