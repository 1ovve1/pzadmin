<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    /** @use HasFactory<Factory<Invite>> */
    use HasFactory;

    protected $fillable = [
        'hash', 'limit',
    ];
}
