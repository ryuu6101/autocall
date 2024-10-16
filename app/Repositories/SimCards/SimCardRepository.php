<?php

namespace App\Repositories\SimCards;

use App\Models\SimCard;
use App\Repositories\BaseRepository;

class SimCardRepository extends BaseRepository implements SimCardRepositoryInterface
{
    public function getModel() {
        return SimCard::class;
    }
}