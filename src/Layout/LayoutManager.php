<?php

declare(strict_types=1);

namespace RedSky\Layout;

use RedSky\View\ViewManager;

final class LayoutManager
{
    protected ?string $defaultLayout = null;


    public function __construct()
    {
        $this->defaultLayout = ViewManager::layout();
    }


    /**
     * Get the application default layout.
     */
    public function default(): ?string
    {
        return $this->defaultLayout;
    }


    /**
     * Resolve the layout for a view.
     */
    public function resolve(
        ?string $layout = null
    ): ?string {

        if ($layout !== null) {
            return $layout;
        }


        return $this->defaultLayout;
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase pertenece a redsky-ui y se encarga de resolver qué layout
    | utilizará una aplicación visual.
    |
    | Sus responsabilidades son:
    |
    | - Proporcionar el layout por defecto de la aplicación.
    | - Permitir que una vista sobrescriba el layout.
    | - Preparar la integración futura con reglas más avanzadas.
    |
    | Ejemplos futuros:
    |
    | - Layout público.
    | - Layout administrativo.
    | - Layout autenticado.
    | - Layout basado en permisos o rutas.
    |
    | Esta clase NO debe:
    |
    | - Renderizar HTML.
    | - Buscar archivos de layout.
    | - Ejecutar vistas.
    | - Conocer componentes Bootstrap/Tailwind.
    |
    | La aplicación de layouts pertenece a redsky-view.
    |
    */
}