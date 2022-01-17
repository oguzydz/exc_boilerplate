<?php

namespace App\View\Components\Includes;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Header extends Component
{
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();

        if($user){

            $isAdmin = Admin::where('user_id', $user->id)->first();

            return view('components.includes.header', [
                'user' => $user,
                'isAdmin' => $isAdmin
            ]);
        }

        return view('components.includes.header', [
            'user' => $user,
        ]);
    }
}
