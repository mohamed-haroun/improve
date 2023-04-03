<?php

namespace views;

class View
{
    public function render(string $view, array $info):void
    {
        $viewContent = $this->renderView($view);
        $layout = $this->renderLayout();

        echo str_replace(["{{content}}", "{{pageName}}", "{{email}}", "{{password}}"], [$viewContent, ...$info], $layout);
    }

    public function renderView($view): string
    {
        ob_start();
        include $view . ".php";
        return ob_get_clean();
    }

    public function renderLayout(string $layout = 'main_layout'):string
    {
        ob_start();
        include_once __DIR__ . "/layout/$layout.php";
        return ob_get_clean();

    }
}