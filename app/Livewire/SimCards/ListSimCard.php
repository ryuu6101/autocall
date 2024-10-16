<?php

namespace App\Livewire\SimCards;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\SimCards\SimCardRepositoryInterface;

class ListSimCard extends Component
{
    use WithPagination;

    protected $simCardRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(SimCardRepositoryInterface $simCardRepos) {
        $this->simCardRepos = $simCardRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function render()
    {
        $sim_cards = $this->simCardRepos->filter($this->params, $this->paginate);
        return view('admin.sections.sim-cards.livewire.list-sim-card')->with(['sim_cards' => $sim_cards]);
    }
}
