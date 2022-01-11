<?php

namespace App\View\Components\Shop;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Header extends Component
{
    public $user;

    public $company;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(UserService $userService, Request $request, User $user)
    {
        $this->userService = $userService;
        $this->slug = $request->route()->action['slug'];
        $this->company = $this->userService->getCompanyBySlug($this->slug);
        $this->user = $user->findorFail($this->company->user_id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shop.header', [
            'user' => $this->user,
            'company' => $this->company,
        ]);
    }
}
