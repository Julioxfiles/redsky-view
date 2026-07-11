<?php

namespace RedSky\View\Rendering;

class Renderer
{
    /**
     * Render a view file with data.
     */
    public function render(string $file, array $data = []): string
    {
        if (! empty($data)) {
            extract($data);
        }

        ob_start();

        include $file;

        return ob_get_clean();
    }
}