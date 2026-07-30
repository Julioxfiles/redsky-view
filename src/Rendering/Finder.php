<?php

declare(strict_types=1);

namespace RedSky\View\Rendering;

class Finder
{
    protected string $path;


    public function __construct(string $path)
    {
        $this->path = rtrim(
            $path,
            '/\\'
        );
    }


    /**
     * Find a view file.
     */
    public function find(string $view): string
    {
        $file = $this->path
            . DIRECTORY_SEPARATOR
            . str_replace(
                '.',
                DIRECTORY_SEPARATOR,
                $view
            )
            . '.php';

        if (! file_exists($file)) {
            throw new ViewException(
                "View [{$view}] not found."
            );
        }

        return $file;
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase localiza archivos físicos de vistas y layouts dentro
    | del sistema de archivos.
    |
    | Sus responsabilidades son:
    |
    | - Convertir nombres de vistas usando notación por puntos.
    | - Obtener la ruta física correspondiente.
    | - Verificar que el archivo exista.
    | - Devolver la ruta absoluta del archivo.
    |
    | Esta clase NO debe:
    |
    | - Renderizar vistas.
    | - Aplicar layouts.
    | - Resolver componentes UI.
    | - Administrar configuración.
    | - Tomar decisiones de negocio.
    |
    | Su única responsabilidad es localizar archivos para el motor de
    | renderizado.
    |
    */
}