<?php

declare(strict_types=1);

namespace RedSky\View\Rendering;

use RedSky\View\Foundation\ViewManager;

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
            $data['viewData'] ?? []
        );

        if (! $applyLayout) {
            return $content;
        }

        /*
         * Layout priority:
         *
         * 1. Layout explicitly provided for this render.
         * 2. Default layout configured in ViewManager.
         * 3. No layout.
         */

        $layout = $data['layout']
            ?? ViewManager::layout();

        if (empty($layout)) {
            return $content;
        }

        $finder = new Finder(
            ViewManager::path()
        );

        $layoutFile = $finder->find(
            $layout
        );

        $layoutData = array_merge(
            $data['layoutData'] ?? [],
            [
                'content' => $content,
                'title'   => $data['title'] ?? null,
                'scripts' => $data['scripts'] ?? [],
                'styles'  => $data['styles'] ?? [],
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


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase transforma archivos PHP de vistas en HTML.
    |
    | Sus responsabilidades son:
    |
    | - Ejecutar archivos de vista.
    | - Pasar datos hacia las vistas.
    | - Aplicar un layout cuando fue solicitado.
    | - Entregar al layout:
    |      - contenido
    |      - título
    |      - scripts
    |      - estilos
    |
    | Esta clase NO debe:
    |
    | - Tomar decisiones de negocio.
    | - Elegir qué interfaz mostrar.
    | - Resolver componentes UI.
    | - Seleccionar una biblioteca visual.
    |
    | Su única responsabilidad es renderizar vistas PHP.
    |
    */
}