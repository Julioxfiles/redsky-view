<?php
declare(strict_types=1);

namespace RedSky\View\Foundation;

class ViewManager
{
    protected static array $config = [
        'path' => null,
        'layout' => null,
    ];


    /**
     * Configure the view engine.
     *
     * Example:
     *
     * ViewManager::configure([
     *     'path' => '/resources/views',
     *     'layout' => 'layouts.app',
     * ]);
     */
    public static function configure(array $config): void
    {
        self::$config = array_merge(
            self::$config,
            $config
        );
    }


    /**
     * Get views path.
     */
    public static function path(): string
    {
        return self::$config['path'];
    }


    /**
     * Get default layout.
     *
     * This layout acts only as a fallback.
     *
     * Any layout explicitly provided by the application
     * has priority over this value.
     */
    public static function layout(): ?string
    {
        return self::$config['layout'];
    }


    /**
     * Get complete configuration.
     */
    public static function all(): array
    {
        return self::$config;
    }


    /**
     * Create a view builder.
     */
    public static function make(
        string $view
    ): ViewBuilder {
        return new ViewBuilder($view);
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    Esta clase NO debe:

    - Elegir layouts según el contexto de la aplicación.
    - Resolver componentes UI.
    - Elegir la biblioteca visual activa.
    - Tomar decisiones de negocio.

    Esas decisiones corresponden a la aplicación o a la capa de UI que utilice este motor de vistas.
    */
}