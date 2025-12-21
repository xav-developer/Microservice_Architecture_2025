<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
class Client extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'username',

        'first_name',
        'last_name',

        'email',
        'phone',
    ];
}
