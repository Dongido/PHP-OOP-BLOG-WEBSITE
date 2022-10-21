<?php

use app\controllers\AboutController;
use app\controllers\SiteController;
use app\controllers\DashboardController;
use app\phpmvc\Application;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function(){
    // echo "Before request from second installation";
});

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/register', [SiteController::class, 'register']); //NOT ACTIVE
$app->router->post('/register', [SiteController::class, 'register']); //NOT ACTIVE
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/login/{id}', [SiteController::class, 'login']);
$app->router->post('/login', [SiteController::class, 'login']);
$app->router->get('/logout', [SiteController::class, 'logout']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/about', [AboutController::class, 'index']);
$app->router->get('/read', [SiteController::class, 'read']);
$app->router->get('/read/{id}', [SiteController::class, 'read']);
$app->router->get('/category/{id}', [SiteController::class, 'category']);
$app->router->get('/admin/dashboard', [DashboardController::class, 'index']);
$app->router->get('/admin/category/create', [DashboardController::class, 'addCategory']);
$app->router->post('/admin/category/create', [DashboardController::class, 'addCategory']);
$app->router->get('/admin/category/view', [DashboardController::class, 'allCategories']);
$app->router->get('/admin/tag/create', [DashboardController::class, 'addTag']);
$app->router->post('/admin/tag/create', [DashboardController::class, 'addTag']);
$app->router->get('/admin/tag/view', [DashboardController::class, 'allTags']);

$app->router->get('/admin/post/create', [DashboardController::class, 'addPost']);
$app->router->post('/admin/post/create', [DashboardController::class, 'addPost']);
$app->router->get('/admin/post/view', [DashboardController::class, 'allPost']);
$app->router->get('/profile', [SiteController::class, 'profile']);
$app->router->get('/profile/{id:\d+}/{username}', [SiteController::class, 'login']);
// /profile/{id}
// /profile/13
// \/profile\/\w+

// /profile/{id}/zura
// /profile/12/zura

// /{id}
$app->run();
