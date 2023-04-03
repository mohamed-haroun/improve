<?php

namespace controllers;

use attributesRoute\Get;

class InvoicesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    #[Get('/invoices')]
    public function index():void
    {
        parent::render('invoices', ['pageName'=>"Invoices"]);
    }
}