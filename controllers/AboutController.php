<?php

namespace app\controllers;


use app\phpmvc\Controller;

/**
 * Class AboutController
 *
 * @author  Gideon gideoti
 * @package app\controllers
 */
class AboutController extends Controller
{
    public function index()
    {
        return $this->render('about');
    }
}