<?php

namespace RedSky\View;

class ViewManager
{
    protected static array $config = [
        'path' => null,
        'layout' => null,
    ];


    /**
     * Configure the view manager.
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
     */
    public static function layout(): ?string
    {
        return self::$config['layout'];
    }


    /**
     * Get all configuration.
     */
    public static function all(): array
    {
        return self::$config;
    }


    /**
     * Create a view builder.
     */
    public static function make(string $view): ViewBuilder
    {
        return new ViewBuilder($view);
    }
}