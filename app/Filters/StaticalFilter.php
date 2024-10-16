<?php

namespace App\Filters;

class StaticalFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'agency_id',
        'imported_amount',
        'sold_amount',
        'note',
        'status',
    ];
}

