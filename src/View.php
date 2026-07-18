<?php

namespace RedSky\View;

use RedSky\View\Rendering\Finder;
use RedSky\View\Rendering\Renderer;

class View
{
    /**
     * Create a view instance.
     */
    public static function make(
        string $view,
        array $data = [],
        bool $applyLayout = true,
        ?string $layout = null,
        array $layoutData = [],
        array $scripts = [],
        array $styles = [],
        ?string $title = null
    ): string {
        $finder = new Finder(
            ViewManager::path()
        );

        $file = $finder->find($view);

        $renderer = new Renderer();

        return $renderer->render(
            $file,
            [
                'viewData' => $data,
                'layout' => $layout,
                'layoutData' => $layoutData,
                'scripts' => $scripts,
                'styles' => $styles,
                'title' => $title,
            ],
            $applyLayout
        );
    }


    /**
     * Render from a ViewBuilder instance.
     */
    public static function renderBuilder(ViewBuilder $builder): string
    {
        return self::make(
            $builder->view(),
            $builder->data(),
            $builder->shouldApplyLayout(),
            $builder->getLayout(),
            $builder->getLayoutData(),
            $builder->getScripts(),
            $builder->getStyles(),
            $builder->getTitle()
        );
    }
}