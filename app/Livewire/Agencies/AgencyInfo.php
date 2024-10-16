<?php

namespace App\Livewire\Agencies;

use Livewire\Component;
use App\Repositories\Agencies\AgencyRepositoryInterface;

class AgencyInfo extends Component
{
    protected $agencyRepos;

    public $agency;

    public function boot(AgencyRepositoryInterface $agencyRepos) {
        $this->agencyRepos = $agencyRepos;
    }

    public function modalSetup($id) {
        $this->agency = $this->agencyRepos->find(abs($id));
    }

    public function render()
    {
        return view('admin.sections.agencies.livewire.agency-info');
    }
}
