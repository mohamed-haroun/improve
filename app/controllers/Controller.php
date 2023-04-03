<?php

namespace controllers;

use views\View;

class Controller
{
    private View $view;
    public function __construct()
    {
        $this->view = new View();
    }

    protected function render(string $view, array $info):void
    {
        $this->view->render($view, $info);

    }
}