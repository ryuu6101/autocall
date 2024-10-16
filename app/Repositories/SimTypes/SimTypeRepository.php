<?php

namespace App\Repositories\SimTypes;

use App\Models\SimType;
use App\Repositories\BaseRepository;

class SimTypeRepository extends BaseRepository implements SimTypeRepositoryInterface
{
    public function getModel() {
        return SimType::class;
    }
}