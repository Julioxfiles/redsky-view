<?php

declare(strict_types=1);

namespace RedSky\View\Rendering;

use RedSky\View\Foundation\ViewManager;

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

        $file = $finder->find(
            $layout
        );

        $data['content'] = $content;

        ob_start();

        extract(
            $data,
            EXTR_SKIP
        );

        include $file;

        return ob_get_clean();
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase envuelve el contenido generado por una vista dentro
    | de un layout.
    |
    | Sus responsabilidades son:
    |
    | - Recibir contenido HTML.
    | - Localizar el archivo del layout.
    | - Inyectar el contenido dentro del layout.
    | - Generar el HTML final.
    |
    | Esta clase NO debe:
    |
    | - Elegir qué layout utilizar.
    | - Resolver componentes UI.
    | - Seleccionar una biblioteca visual.
    | - Administrar assets o temas.
    | - Tomar decisiones de negocio.
    |
    | Su única responsabilidad es aplicar un layout al contenido recibido.
    |
    */
}