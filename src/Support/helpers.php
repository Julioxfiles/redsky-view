<?php

use RedSky\View\View;
use RedSky\View\ViewBuilder;

if (! function_exists('view')) {

    /**
     * Create a view builder instance or render immediately.
     */
    function view(
        string $name,
        array $data = [],
        ?bool $applyLayout = null
    ): ViewBuilder|string {

        /**
         * Legacy mode:
         *
         * view('partials.footer', [], false)
         *
         * Renders immediately without layout.
         */
        if ($applyLayout !== null) {

            return View::make(
                $name,
                $data,
                $applyLayout
            );
        }


        /**
         * Builder mode:
         *
         * view('users.index')
         *      ->with(...)
         *      ->layout(...)
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