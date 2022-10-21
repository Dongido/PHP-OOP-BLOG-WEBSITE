<?php

namespace app\controllers;

use app\phpmvc\Application;
use app\phpmvc\Controller;
use app\phpmvc\Uploader;
use app\models\Category;
use app\models\Tag;
use app\models\Post;
use app\phpmvc\Request;
use app\phpmvc\Response;

/**
 * Class DashboardController
 *
 * @author  Gideon gideoti
 * @package app\controllers
 */
class DashboardController extends Controller
{
    public function index()
    {
        $registerModel = new Post();
        $response = $registerModel->getAllPost('categories', 'tags');

        $this->setLayout('admin');
        return $this->render('admin/dashboard', [
            'posts' => $response
        ]);
    }

    public function addCategory(Request $request)
    {
        $registerModel = new Category();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Category added successfully');
                Application::$app->response->redirect('/admin/category/view');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('admin/add-category', [
            'model' => $registerModel
        ]);
    }

    public function allCategories()
    {
        $registerModel = new Category();
        $response = $registerModel->getAll(20);

        $this->setLayout('admin');
        return $this->render('admin/view-categories', [
            'categories' => $response
        ]);
    }

    public function addTag(Request $request)
    {
        $registerModel = new Tag();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Tag added successfully');
                Application::$app->response->redirect('/admin/tag/view');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('admin/add-tag', [
            'model' => $registerModel
        ]);
    }

    public function allTags()
    {
        $registerModel = new Tag();
        $response = $registerModel->getAll(20);

        $this->setLayout('admin');
        return $this->render('admin/view-tags', [
            'tags' => $response
        ]);
    }

    public function addPost(Request $request)
    {
        $registerModel = new Post();
        if ($request->getMethod() === 'post') {
            $registerModel->loadData($request->getBody());
            $formBody = $request->getBody();
            $title = $formBody['title'];
            $photo = $formBody['photoupload'];
            //var_dump($formBody);

           // $uploader   =   new Uploader();
            //$uploader->setDir('uploads/photos/');
            //$uploader->setExtensions(array('jpg','jpeg','png','gif'));  //allowed extensions list//
            //$uploader->setMaxSize(.5);                          //set max file size to be allowed in MB//

            //if($uploader->uploadFile($photo)){     
                //$image  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            //}else{//upload failed
                //$uploader->getMessage(); //get upload error message 
           // }

            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->session->setFlash('success', 'Post added successfully');
                Application::$app->response->redirect('/admin/post/view');
                return 'Show success page';
            }
        }

        $this->setLayout('admin');
        return $this->render('admin/add-post', [
            'model' => $registerModel
        ]);
    }

    public function allPost()
    {
        $registerModel = new Post();
        $response = $registerModel->getAllPost('categories', 'tags');

        $this->setLayout('admin');
        return $this->render('admin/view-post', [
            'posts' => $response
        ]);
    }


    public function getTags()
    {
        $registerModel = new Tag();
        $response = $registerModel->getAll(20);

        return $response;
    }


    public function getCategories()
    {
        $registerModel = new Category();
        $response = $registerModel->getAll(20);

        return $response;
    }

    
}