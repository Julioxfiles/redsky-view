<?php

declare(strict_types=1);

namespace RedSky\View\Assets;

final class AssetManager
{
    protected array $scripts = [];

    protected array $styles = [];


    /**
     * Add javascript files.
     */
    public function addScript(
        array|string $scripts
    ): self {

        $scripts = is_array($scripts)
            ? $scripts
            : [$scripts];


        $this->scripts = array_merge(
            $this->scripts,
            $scripts
        );


        return $this;
    }


    /**
     * Add stylesheet files.
     */
    public function addStyle(
        array|string $styles
    ): self {

        $styles = is_array($styles)
            ? $styles
            : [$styles];


        $this->styles = array_merge(
            $this->styles,
            $styles
        );


        return $this;
    }


    /**
     * Get registered scripts.
     */
    public function scripts(): array
    {
        return $this->scripts;
    }


    /**
     * Get registered styles.
     */
    public function styles(): array
    {
        return $this->styles;
    }


    /**
     * Clear registered assets.
     */
    public function clear(): void
    {
        $this->scripts = [];

        $this->styles = [];
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase pertenece a redsky-ui y administra los recursos visuales
    | necesarios para una página.
    |
    | Sus responsabilidades son:
    |
    | - Registrar archivos JavaScript.
    | - Registrar archivos CSS.
    | - Entregar la lista de assets a la capa de vistas.
    |
    | Ejemplos:
    |
    | - users.js para una página de usuarios.
    | - dashboard.css para un panel.
    | - Bootstrap CSS/JS agregado por una librería UI.
    |
    | Esta clase NO debe:
    |
    | - Insertar HTML directamente.
    | - Renderizar etiquetas script o link.
    | - Conocer layouts.
    | - Elegir Bootstrap o Tailwind.
    |
    | La decisión de la librería visual pertenece a UiManager.
    |
    */
}