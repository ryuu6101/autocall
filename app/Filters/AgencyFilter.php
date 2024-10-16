<?php

namespace App\Filters;

class AgencyFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'code',
        'phone',
        'address',
        'topic_result',
        'scanner_code',
        'note',
        'status',
    ];
    
    public function filterName($name) {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}

