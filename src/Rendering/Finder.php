<?php

namespace RedSky\View\Rendering;

use RedSky\View\Rendering\ViewException;

class Finder
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = rtrim($path, '/\\');
    }

    /**
     * Find a view file.
     */
    public function find(string $view): string
    {
        $file = $this->path . DIRECTORY_SEPARATOR .
            str_replace('.', DIRECTORY_SEPARATOR, $view) .
            '.php';

        if (! file_exists($file)) {
            throw new ViewException(
                "View [{$view}] not found."
            );
        }

        return $file;
    }
}