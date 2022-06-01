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
        $this->company     = $this->userService->getCompanyBySlug($request->route()->action['slug']);
        $this->user        = $user->findorFail($this->company->user_id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        view()->composer('components.shop.footer', function ($view) {
            $company = $this->company;
            $view->with(compact('company'));
        });

        return view('components.shop.header', [
            'user'    => $this->user,
            'company' => $this->company,
        ]);
    }
}
