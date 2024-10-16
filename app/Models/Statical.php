<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statical extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'agency_id',
        'imported_amount',
        'sold_amount',
        'note',
        'status',
    ];

    public function agency() {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
