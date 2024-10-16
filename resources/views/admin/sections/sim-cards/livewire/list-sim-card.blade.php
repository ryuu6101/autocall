<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Danh sách thẻ sim
                </h6>
                <div class="header-elements"></div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <select class="form-select form-select-sm custom-select mb-3 w-auto" wire:model="paginate">
                            @for ($page = 5; $page <= 20; $page+=5)
                            <option value="{{ $page }}">{{ $page }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#crudSimCardModal">
                            <i class="icon-plus3 mr-2"></i>
                            Thêm mới
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark table-sm align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">STT</th>
                                        <th scope="col" class="text-center">Số sim</th>
                                        <th scope="col" class="text-center">Gói cước</th>
                                        <th scope="col" class="text-center">Hạn sử dụng</th>
                                        <th scope="col" class="text-center">Đại lý</th>
                                        <th scope="col" class="text-center">Trạng thái</th>
                                        <th scope="col" class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sim_cards && count($sim_cards) > 0)
                                    @php($sn = ($sim_cards->perPage() * ($sim_cards->currentPage() - 1)) + 1)
                                    @foreach ($sim_cards as $key => $sim_card)
                    
                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        <td class="text-center">{{ $sim_card->card_number ?? '' }}</td>
                                        <td class="text-center">{{ $sim_card->package ?? '' }}</td>
                                        <td class="text-center">
                                            @if ($sim_card && $sim_card->duration)
                                            {{ $sim_card->duration }} ngày
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $sim_card->agency->name ?? '' }}</td>
                                        <td class="text-center">{{ $sim_card->status ?? '' }}</td>
                                        <td class="text-center">
                                            <span type="button" class="badge badge-sm badge-primary" 
                                            data-toggle="modal" data-target="#simCardInfoModal" data-sim-card-id="{{ $sim_card->id }}">
                                                <i class="icon-eye"></i>
                                            </span>
                                            <span type="button" class="badge badge-sm badge-success" 
                                            data-toggle="modal" data-target="#crudSimCardModal" data-sim-card-id="{{ $sim_card->id }}">
                                                <i class="icon-pencil5"></i>
                                            </span>
                                            <span type="button" class="badge badge-sm badge-danger" 
                                            data-toggle="modal" data-target="#crudSimCardModal" data-sim-card-id="{{ -$sim_card->id }}">
                                                <i class="icon-trash"></i>
                                            </span>
                                        </td>
                                    </tr>
                    
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">(Không có dữ liệu)</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @include('admin.components.livewire-table-nav', ['collection' => $sim_cards])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>