<?php

namespace RedSky\View;

use RedSky\View\Rendering\Finder;
use RedSky\View\Rendering\Renderer;

class View
{
    /**
     * Create a view instance.
     */
    public static function make(string $view, array $data = []): string
    {
        $finder = new Finder(
            ViewManager::path()
        );

        $file = $finder->find($view);

        $renderer = new Renderer();

        return $renderer->render($file, $data);
    }
}