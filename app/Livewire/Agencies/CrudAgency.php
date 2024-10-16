<?php

namespace App\Livewire\Agencies;

use Livewire\Component;
use App\Livewire\Agencies\ListAgency;
use App\Repositories\Agencies\AgencyRepositoryInterface;

class CrudAgency extends Component
{
    protected $agencyRepos;

    public $agency;
    public $action;

    // Params
    public $name;
    public $code;
    public $phone;
    public $address;
    public $note;
    // Params

    public function boot(AgencyRepositoryInterface $agencyRepos) {
        $this->agencyRepos = $agencyRepos;
    }

    public function rules() {
        return [
            'name' => ['required'],
            'code' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'note' => ['nullable'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên đại lý.',
            'code.required' => 'Vui lòng nhập mã đại lý',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
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

        $this->agency = $this->agencyRepos->find(abs($id));

        if ($id < 0) return;
        $this->resetErrorBag();
        $this->getData();
    }

    public function getData() {
        $this->name = $this->agency->name ?? '';
        $this->code = $this->agency->code ?? '';
        $this->phone = $this->agency->phone ?? '';
        $this->address = $this->agency->address ?? '';
        $this->note = $this->agency->note ?? '';
    }

    public function create() {
        $this->resetErrorBag();
        $params = $this->validate();
        $agency = $this->agencyRepos->create($params);
        $this->postCrud('Đã thêm đại lý');
    }

    public function update() {
        $this->resetErrorBag();
        $params = $this->validate();
        $this->agency->update($params);
        $this->postCrud('Đã cập nhật đại lý');
    }

    public function delete() {
        $this->agency->delete();
        $this->reset('agency');
        $this->postCrud('Đã xóa đại lý');
    }

    public function postCrud($message = 'Success') {
        $this->dispatch('refresh')->to(ListAgency::class);
        $this->dispatch('close-crud-agency-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.agencies.livewire.crud-agency');
    }
}
