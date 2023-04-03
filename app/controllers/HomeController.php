<?php

namespace controllers;

use attributesRoute\Get;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    #[Get('/')]
    public function index():void
    {
        parent::render('home', ['pageName'=>"Home"]);
    }

    #[Get('/contact')]
    public function contact():void
    {
        parent::render('contact', ['pageName'=>"Contact Us"]);
    }

    #[Get('/error')]
    public function error():void
    {
        parent::render('error', ['pageName'=>"404"]);
    }
}