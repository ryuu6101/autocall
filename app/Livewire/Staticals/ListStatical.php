<?php

namespace App\Livewire\Staticals;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Staticals\StaticalRepositoryInterface;

class ListStatical extends Component
{
    use WithPagination;

    protected $staticalRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(StaticalRepositoryInterface $staticalRepos) {
        $this->staticalRepos = $staticalRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function render()
    {
        $staticals = $this->staticalRepos->filter($this->params, $this->paginate);
        return view('admin.sections.staticals.livewire.list-statical')->with(['staticals' => $staticals]);
    }
}
