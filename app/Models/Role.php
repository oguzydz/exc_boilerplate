<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function hasRoles()
    {
        return $this->hasMany(ModelHasRole::class, 'role_id', 'id');
    }
}
