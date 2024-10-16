<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agency extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'code',
        'phone',
        'address',
        'topic_result',
        'scanner_code',
        'note',
        'status',
    ];
}
