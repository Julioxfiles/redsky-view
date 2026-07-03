<?php

declare(strict_types=1);

namespace RedSky\View\Contracts;

interface UiLibrary
{
    /**
     * Devuelve el nombre de la biblioteca.
     */
    public function name(): string;
}