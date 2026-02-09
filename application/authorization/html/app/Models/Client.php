<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasUuids;

    /**
     * @var string[]
     */
    protected $fillable = [
        'username',
        'password',

        'first_name',
        'last_name',

        'email',
        'phone',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

        'password' => 'hashed',
    ];
}
