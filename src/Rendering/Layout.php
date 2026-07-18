<?php

namespace RedSky\View\Rendering;

use RedSky\View\ViewManager;

class Layout
{
    /**
     * Render content inside a layout.
     */
    public function wrap(
        string $content,
        ?string $layout = null,
        array $data = []
    ): string {
        $layout = $layout
            ?? ViewManager::layout();

        if (! $layout) {
            return $content;
        }

        $finder = new Finder(
            ViewManager::path()
        );

        $file = $finder->find($layout);

        $data['content'] = $content;

        ob_start();

        extract(
            $data,
            EXTR_SKIP
        );

        include $file;

        return ob_get_clean();
    }
}