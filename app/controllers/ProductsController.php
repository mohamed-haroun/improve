<?php

namespace controllers;

use attributesRoute\Get;

class ProductsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    #[Get('/products')]
    public function index():void
   {
       parent::render('products', ['pageName'=>"Products"]);
   }
}