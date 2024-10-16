<?php

namespace App\Repositories\Agencies;

use App\Models\Agency;
use App\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    public function getModel() {
        return Agency::class;
    }
}