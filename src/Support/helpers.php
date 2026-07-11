<?php

use RedSky\View\View;

if (! function_exists('view')) {

    /**
     * Render a view.
     */
    function view(string $name, array $data = []): string
    {
        return View::make($name, $data);
    }
}