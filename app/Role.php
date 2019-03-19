<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Role
 *
 */

class Role extends Model
{
    const ADMIN = 1;
    const SUMA = 2;
    const EXTERNO = 3;

    // public $incrementing = false;
}
