<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ajax/articles", name="ajax_")
 */
class AjaxController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function getAllArticles(ArticleRepository $articleRepository)
    {
        return $this->json($articleRepository->findAll(), 200);
    }

    /**
     * @Route("/new", name="article_new", methods={"GET","POST"})
     */
    public function createArticle(Request $request)
    {
        $article = new Article();

        $data = json_decode(
            $request->getContent(),
            true
        );

        $article->setTitle($data['title']);
        $article->setContent($data['content']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->json('Article created', 200);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function getOnArticle(Article $article)
    {
        return $this->json($article, 200);
    }

    /**
     * @Route("/{id}/edit", name="article_edit", methods={"GET","POST"})
     */
    public function editArticle(Request $request, Article $article)
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        $article->setTitle($data['title']);
        $article->setContent($data['content']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        return $this->json('Article updated', 200);
    }

    /**
     * @Route("/{id}", name="article_delete", methods={"DELETE"})
     */
    public function deleteArticle(Request $request, Article $article)
    {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();

        return $this->json('Article deleted', 200);
    }
}
