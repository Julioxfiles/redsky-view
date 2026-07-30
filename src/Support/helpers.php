<?php

declare(strict_types=1);

use RedSky\View\Foundation\View;
use RedSky\View\Foundation\ViewBuilder;


if (! function_exists('view')) {

    /**
     * Create a view builder instance or render immediately.
     */
    function view(
        string $name,
        array $data = [],
        ?bool $applyLayout = null
    ): ViewBuilder|string {

        /*
         * Legacy mode:
         *
         * view('partials.footer', [], false)
         *
         * Render immediately without layout.
         */
        if ($applyLayout !== null) {

            return View::make(
                $name,
                $data,
                $applyLayout
            );
        }


        /*
         * Builder mode:
         *
         * view('users.index')
         *      ->with('users', $users)
         *      ->layout('layouts.app')
         *
         * The builder only stores view information.
         * Rendering is delegated to redsky-view.
         */
        $builder = new ViewBuilder($name);


        if (! empty($data)) {
            $builder->withData($data);
        }


        return $builder;
    }
}


if (! function_exists('render_view')) {

    /**
     * Render a view immediately.
     */
    function render_view(
        string $name,
        array $data = [],
        bool $applyLayout = true
    ): string {

        return View::make(
            $name,
            $data,
            $applyLayout
        );
    }
}