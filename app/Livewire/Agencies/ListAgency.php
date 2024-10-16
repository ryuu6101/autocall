<?php

namespace App\Livewire\Agencies;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Agencies\AgencyRepositoryInterface;

class ListAgency extends Component
{
    use WithPagination;

    protected $agencyRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(AgencyRepositoryInterface $agencyRepos) {
        $this->agencyRepos = $agencyRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function render()
    {
        $agencies = $this->agencyRepos->filter($this->params, $this->paginate);
        return view('admin.sections.agencies.livewire.list-agency')->with(['agencies' => $agencies]);
    }
}
