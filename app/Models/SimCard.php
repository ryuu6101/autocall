<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SimCard extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'scan_code',
        'card_number',
        'package',
        'duration',
        'register_date',
        'expired_date',
        'price',
        'agency_id',
        'status',
        'otp_status',
        'sim_type_id',
    ];

    public function agency() {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
