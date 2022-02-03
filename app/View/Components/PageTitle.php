<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class PageTitle extends Component
{

    public $title;
    public $parentTitle;
    public $parentRoute;
    public $childTitle;
    public $childRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $parentTitle = null, $parentRoute = null, $childTitle = null, $childRoute = null)
    {
        $this->title = $title;
        $this->parentTitle = $parentTitle;
        $this->parentRoute = $parentRoute;
        $this->childTitle = $childTitle;
        $this->childRoute = $childRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $products = Product::orderBy('order')->paginate(8)->where('language', app()->getLocale());

        return view('components.page-title', [
            'products' => $products,
        ]);
    }
}
