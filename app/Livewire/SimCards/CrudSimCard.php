<?php

namespace App\Livewire\SimCards;

use Livewire\Component;
use App\Livewire\SimCards\ListSimCard;
use App\Repositories\Agencies\AgencyRepositoryInterface;
use App\Repositories\SimCards\SimCardRepositoryInterface;
use App\Repositories\SimTypes\SimTypeRepositoryInterface;

class CrudSimCard extends Component
{
    protected $agencyRepos;
    protected $simTypeRepos;
    protected $simCardRepos;

    public $sim_card;
    public $action;
    public $agencies;
    public $sim_types;

    // Params
    public $card_number;
    public $scan_code;
    public $package;
    public $duration;
    public $price;
    public $agency_id;
    public $sim_type_id;
    // Params

    public function boot(
        AgencyRepositoryInterface $agencyRepos,
        SimTypeRepositoryInterface $simTypeRepos,
        SimCardRepositoryInterface $simCardRepos,
    ) {
        $this->agencyRepos = $agencyRepos;
        $this->simTypeRepos = $simTypeRepos;
        $this->simCardRepos = $simCardRepos;
    }

    public function mount() {
        $this->agencies = $this->agencyRepos->getAll();
        $this->sim_types = $this->simTypeRepos->getAll();
    }

    public function rules() {
        return [
            'card_number' => ['required'],
            'scan_code' => ['required'],
            'package' => ['required'],
            'duration' => ['required', 'gt:0'],
            'price' => ['required', 'gt:0'],
            'agency_id' => ['gt:0'],
            'sim_type_id' => ['gt:0']
        ];
    }

    public function messages() {
        return [
            'card_number.required' => 'Vui lòng nhập số sim.',
            'scan_code.required' => 'Vui lòng nhập mã scan',
            'package.required' => 'Vui lòng nhập gói cước',
            'duration.required' => 'Vui lòng nhập hạn sử dụng',
            'duration.gt' => 'Hạn sử dụng phải lớn hơn 0',
            'price.required' => 'Vui lòng nhập giá tiền',
            'price.gt' => 'Giá tiền phải lớn hơn 0',
        ];
    }

    public function modalSetup($id) {
        if ($id > 0) {
            $this->action = 'update';
        } elseif ($id < 0) {
            $this->action = 'delete';
        } else {
            $this->action = 'create';
        }

        $this->sim_card = $this->simCardRepos->find(abs($id));

        if ($id < 0) return;
        $this->resetErrorBag();
        $this->getData();
    }

    public function getData() {
        $this->card_number = $this->sim_card->card_number ?? '';
        $this->scan_code = $this->sim_card->scan_code ?? '';
        $this->package = $this->sim_card->package ?? '';
        $this->duration = $this->sim_card->duration ?? '';
        $this->price = $this->sim_card->price ?? '';
        $this->agency_id = $this->sim_card->agency_id ?? $this->agencies->first()->id ?? 0;
        $this->sim_type_id = $this->sim_card->sim_type_id ?? $this->sim_types->first()->id ?? 0;
    }

    public function create() {
        $this->resetErrorBag();
        $params = $this->validate();
        $sim_card = $this->simCardRepos->create($params);
        $this->postCrud('Đã thêm thẻ sim');
    }

    public function update() {
        $this->resetErrorBag();
        $params = $this->validate();
        $this->sim_card->update($params);
        $this->postCrud('Đã cập nhật thẻ sim');
    }

    public function delete() {
        $this->sim_card->delete();
        $this->reset('sim_card');
        $this->postCrud('Đã xóa thẻ sim');
    }

    public function postCrud($message = 'Success') {
        $this->dispatch('refresh')->to(ListSimCard::class);
        $this->dispatch('close-crud-sim-card-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.sim-cards.livewire.crud-sim-card');
    }
}
