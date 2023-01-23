<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public string $title;
    public string $breadcrumb;
    public string $breadcrumbItem;

    public function __construct(string $title = null, string $breadcrumb = null, string $breadcrumbItem = null)
    {
        $this->title = $title ?? config('app.name');
        $this->breadcrumb = $breadcrumb ?? 'Dashboard';
        $this->breadcrumbItem = $breadcrumbItem ?? 'Dashboard';
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
