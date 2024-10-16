<?php

namespace App\Livewire\SimCards;

use Livewire\Component;
use App\Repositories\SimCards\SimCardRepositoryInterface;

class SimCardInfo extends Component
{
    protected $simCardRepos;

    public $sim_card;

    public function boot(SimCardRepositoryInterface $simCardRepos) {
        $this->simCardRepos = $simCardRepos;
    }

    public function modalSetup($id) {
        $this->sim_card = $this->simCardRepos->find(abs($id));
    }

    public function render()
    {
        return view('admin.sections.sim-cards.livewire.sim-card-info');
    }
}
