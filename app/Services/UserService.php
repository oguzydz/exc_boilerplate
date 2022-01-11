<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class UserService
{
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

    public function getCompanyBySlug(string $slug)
    {
        try {
            $company = Company::where('slug', $slug)->firstOrFail();
            return $company;
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }
}
