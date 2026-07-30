<?php

declare(strict_types=1);

namespace RedSky\View\Themes;

final class ThemeManager
{
    protected string $theme = 'default';


    /**
     * Set active theme.
     */
    public function set(
        string $theme
    ): void {
        $this->theme = $theme;
    }


    /**
     * Get active theme.
     */
    public function current(): string
    {
        return $this->theme;
    }


    /**
     * Check if theme is active.
     */
    public function is(
        string $theme
    ): bool {
        return $this->theme === $theme;
    }


    /*
    |--------------------------------------------------------------------------
    | Responsabilidad de esta clase
    |--------------------------------------------------------------------------
    |
    | Esta clase pertenece a redsky-ui y administra el tema visual activo
    | de una aplicación.
    |
    | Sus responsabilidades son:
    |
    | - Mantener el tema actual.
    | - Permitir cambiar entre temas.
    | - Servir información del tema seleccionado.
    |
    | Ejemplos futuros:
    |
    |     default
    |     admin
    |     dark
    |
    | En el futuro puede integrarse con:
    |
    | - LayoutManager.
    | - Configuración de usuario.
    | - Preferencias del sistema.
    |
    | Esta clase NO debe:
    |
    | - Renderizar vistas.
    | - Cargar archivos CSS.
    | - Elegir Bootstrap o Tailwind.
    | - Crear componentes.
    |
    | Su responsabilidad es únicamente administrar la identidad visual.
    |
    */
}