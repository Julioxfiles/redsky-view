<?php

namespace RedSky\View\Rendering;

use RedSky\View\ViewManager;

class Layout
{
    /**
     * Apply the configured layout.
     */
    public function wrap(string $content): string
    {
        $layout = ViewManager::layout();

        if (! $layout) {
            return $content;
        }

        $finder = new Finder(
            ViewManager::path()
        );

        $file = $finder->find($layout);

        ob_start();

        include $file;

        return ob_get_clean();
    }
}