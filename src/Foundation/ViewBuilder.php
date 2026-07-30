<?php
declare(strict_types=1);

namespace RedSky\View\Foundation;

class ViewBuilder
{
    protected string $view;

    protected array $data = [];

    protected ?string $layout = null;

    protected array $layoutData = [];

    protected array $scripts = [];

    protected array $styles = [];

    protected ?string $title = null;

    protected bool $applyLayout = true;


    public function __construct(string $view)
    {
        $this->view = $view;
    }


    /**
     * Add a single data value.
     */
    public function with(
        string $key,
        mixed $value
    ): self {
        $this->data[$key] = $value;

        return $this;
    }


    /**
     * Add multiple data values.
     */
    public function withData(array $data): self
    {
        $this->data = array_merge(
            $this->data,
            $data
        );

        return $this;
    }


    /**
     * Define an explicit layout.
     *
     * This allows a developer to override
     * the layout selected by redsky-ui.
     */
    public function layout(string $layout): self
    {
        $this->layout = $layout;

        return $this;
    }


    /**
     * Add data available only for the layout.
     */
    public function layoutData(array $data): self
    {
        $this->layoutData = array_merge(
            $this->layoutData,
            $data
        );

        return $this;
    }


    /**
     * Define page title.
     */
    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }


    /**
     * Add javascript files.
     */
    public function scripts(
        array|string $scripts
    ): self {
        $scripts = is_array($scripts)
            ? $scripts
            : [$scripts];

        $this->scripts = array_merge(
            $this->scripts,
            $scripts
        );

        return $this;
    }


    /**
     * Add stylesheet files.
     */
    public function styles(
        array|string $styles
    ): self {
        $styles = is_array($styles)
            ? $styles
            : [$styles];

        $this->styles = array_merge(
            $this->styles,
            $styles
        );

        return $this;
    }


    /**
     * Disable layout rendering.
     */
    public function withoutLayout(): self
    {
        $this->applyLayout = false;

        return $this;
    }


    public function view(): string
    {
        return $this->view;
    }


    public function data(): array
    {
        return $this->data;
    }


    public function getLayout(): ?string
    {
        return $this->layout;
    }


    public function getLayoutData(): array
    {
        return $this->layoutData;
    }


    public function getScripts(): array
    {
        return $this->scripts;
    }


    public function getStyles(): array
    {
        return $this->styles;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }


    public function shouldApplyLayout(): bool
    {
        return $this->applyLayout;
    }


    /**
     * Allow automatic rendering when converted to string.
     */
    public function __toString(): string
    {
        return View::renderBuilder($this);
    }


/*
|--------------------------------------------------------------------------
| Responsabilidad de esta clase
|--------------------------------------------------------------------------
|
| Esta clase representa la definición de una vista antes de ser renderizada.
|
| Su responsabilidad es:
|
| - Mantener el nombre de la vista.
| - Almacenar los datos enviados a la vista.
| - Almacenar información opcional como:
|      - layout
|      - título
|      - scripts
|      - estilos
|      - datos del layout
|
| Esta clase NO debe:
|
| - Renderizar la vista.
| - Buscar archivos físicos.
| - Resolver componentes UI.
| - Decidir qué biblioteca visual utilizar.
|
| Solamente representa la definición de una vista que posteriormente será
| renderizada por el motor de vistas.
|
*/
  
}