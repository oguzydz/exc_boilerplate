<?php

namespace App\View\Components\Shop;

use Illuminate\View\Component;

class Aside extends Component
{
    public $company;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Header $header)
    {
        $this->company = $header->company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop.aside', [
            'categories' => $this->company->categories
        ]);
    }
}
