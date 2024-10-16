<?php

namespace App\Repositories\Staticals;

use App\Models\Statical;
use App\Repositories\BaseRepository;

class StaticalRepository extends BaseRepository implements StaticalRepositoryInterface
{
    public function getModel() {
        return Statical::class;
    }
}