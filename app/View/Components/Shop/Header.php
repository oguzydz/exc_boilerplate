<?php

namespace App\View\Components\Shop;

use Illuminate\View\Component;

class Header extends Component
{
    public $profileBgImage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($profileBgImage = null)
    {
        $this->profileBgImage = $profileBgImage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop.header');
    }
}
