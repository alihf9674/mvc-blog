<?php

namespace Application\Controllers;

use Application\Model\Category;
use Application\Model\Article;

class Home extends Controller
{

    public function index()
    {
        $category = new Category();
        $categories = $category->all();
        $article = new Article();
        $articles = $article->all();
        return $this->view('app.index', compact('categories', 'articles'));
    }

    public function category($id)
    {
        $ob_category = new Category();
        $categories = $ob_category->all();
        $ob_category = new Category();
        $category = $ob_category->find($id);
        $ob_category = new Category();
        $articles = $ob_category->article($id);
        return $this->view('app.category', compact('category', 'categories', 'articles'));
    }

    public function detail($id)
    {
        $category = new Category();
        $categories = $category->all();
        $ob_article = new Article();
        $article = $ob_article->find($id);
        return $this->view('app.detail', compact('categories', 'article'));


    }


}