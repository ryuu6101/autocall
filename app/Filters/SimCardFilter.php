<?php

namespace App\Filters;

class SimCardFilter extends QueryFilter
{
    protected $filterable = [
        'id',
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
}

