<?php

namespace app\controllers;

use app\phpmvc\Application;
use app\phpmvc\Controller;
use app\phpmvc\middlewares\AuthMiddleware;
use app\phpmvc\Request;
use app\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;
use app\models\Category;
use app\models\Post;
use app\models\Tag;

/**
 * Class SiteController
 *
 * @author  Gideon gideoti
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function home()
    {
        return $this->render('home');
    }

    public function read(Request $request)
    {
        $id = $request->getRouteParam('id');
        $registerModel = new Post();
        $response = $registerModel->getSinglePost(['id' => $id]);
        
        return $this->render('read-post', [
            'post' => $response
        ]);
    }

    public function category(Request $request)
    {
        $id = $request->getRouteParam('id');
        $registerModel = new Post();
        $response = $this->displayPostByCategory($id, 20);
        
        return $this->render('category', [
            'posts' => $response, 'id' => $id
        ]);
    }

    public function login(Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/admin/dashboard');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        /* $registerModel = new User();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                return 'Show success page';
            }

        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]); */
        Application::$app->response->redirect('/');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
    }
    
    public function displayPostByPosition($position, $limit)
    {
        $registerModel = new Post();
        $response = $registerModel->getPostByPosition('categories', 'tags', ['display_position' => $position],  $limit);

        return $response;
    }

    public function latestNews()
    {
        $registerModel = new Post();
        $response = $registerModel->latestNews();

        return $response;
    }

    public function getCategories($limit)
    {
        $registerModel = new Category();
        $response = $registerModel->getAll($limit);

        return $response;
    }

    public function displayPostByCategory($cat, $limit)
    {
        $registerModel = new Post();
        $response = $registerModel->getPostByCategory('categories', 'tags', ['category_id' => $cat],  $limit);

        return $response;
    }

    public function getCategoryName($id)
    {
        $registerModel = new Category();
        $response = $registerModel->findOne(['id' => $id]);

        return $response;
    }

}
