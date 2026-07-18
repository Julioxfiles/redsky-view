<?php

namespace RedSky\View\Rendering;

use RedSky\View\ViewManager;

class Renderer
{
    /**
     * Render a view file.
     */
    public function render(
        string $file,
        array $data = [],
        bool $applyLayout = true
    ): string {
        $content = $this->renderFile(
            $file,
            $data['viewData'] ?? $data
        );

        if (! $applyLayout) {
            return $content;
        }

        $layout = $data['layout']
            ?? ViewManager::layout();

        if (empty($layout)) {
            return $content;
        }

        $finder = new Finder(
            ViewManager::path()
        );

        $layoutFile = $finder->find($layout);

        $layoutData = array_merge(
            $data['layoutData'] ?? [],
            [
                'content' => $content,
                'title' => $data['title'] ?? null,
                'scripts' => $data['scripts'] ?? [],
                'styles' => $data['styles'] ?? [],
            ]
        );

        return $this->renderFile(
            $layoutFile,
            $layoutData
        );
    }


    /**
     * Render a PHP file.
     */
    protected function renderFile(
        string $file,
        array $data = []
    ): string {
        if (! empty($data)) {
            extract(
                $data,
                EXTR_SKIP
            );
        }

        ob_start();

        include $file;

        return ob_get_clean();
    }
}