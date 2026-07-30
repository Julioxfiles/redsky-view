<?php

declare(strict_types=1);

namespace RedSky\View\Rendering;

use Exception;

class ViewException extends Exception
{
    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase representa excepciones específicas del motor de vistas.
    |
    | Sus responsabilidades son:
    |
    | - Identificar errores del sistema de vistas.
    | - Representar fallos como:
    |      - Vista no encontrada.
    |      - Layout inexistente.
    |      - Error al cargar archivos.
    |      - Error durante el renderizado.
    |
    | Esta clase NO debe:
    |
    | - Resolver errores.
    | - Mostrar páginas de error.
    | - Manejar lógica de aplicación.
    |
    | Su única responsabilidad es representar excepciones propias del
    | motor redsky-view.
    |
    */
}