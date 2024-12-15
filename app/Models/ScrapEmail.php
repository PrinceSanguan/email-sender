<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScrapEmail extends Model
{
    protected $fillable = [
        'name',
        'email-sender',
        'email-receiver',
        'niche',
        'sequence',
    ];
}
