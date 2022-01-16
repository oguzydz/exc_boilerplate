<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Throwable;

class UserService
{
    public $slug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        // $this->slug = $request->route()->action['slug'];
    }

    public function getUserCompany(int $userId)
    {
        try {
            $userCompany = User::findorFail($userId)->company;
            return $userCompany;
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    public function getCompanyBySlug(string $slug = null)
    {
        $slug = $slug ?? $this->slug;

        try {
            $company = Company::where('slug', $slug)->firstOrFail();
            return $company;
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    public function getUserByCompany(int $userId)
    {
        try {
            return User::findOrFail($userId);
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }
}
