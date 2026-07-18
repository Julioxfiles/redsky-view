<?php

namespace RedSky\View;

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


    public function with(string $key, mixed $value): self
    {
        $this->data[$key] = $value;

        return $this;
    }


    public function withData(array $data): self
    {
        $this->data = array_merge(
            $this->data,
            $data
        );

        return $this;
    }


    public function layout(string $layout): self
    {
        $this->layout = $layout;

        return $this;
    }


    public function layoutData(array $data): self
    {
        $this->layoutData = array_merge(
            $this->layoutData,
            $data
        );

        return $this;
    }


    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }


    public function scripts(array|string $scripts): self
    {
        $scripts = is_array($scripts)
            ? $scripts
            : [$scripts];

        $this->scripts = array_merge(
            $this->scripts,
            $scripts
        );

        return $this;
    }


    public function styles(array|string $styles): self
    {
        $styles = is_array($styles)
            ? $styles
            : [$styles];

        $this->styles = array_merge(
            $this->styles,
            $styles
        );

        return $this;
    }


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
     * Render automatically when used as string.
     */
    
    public function __toString(): string
    {
        return View::renderBuilder($this);
    }
        

}