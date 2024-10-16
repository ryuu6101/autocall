<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Danh sách đại lý
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
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#crudAgencyModal">
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
                                        <th scope="col" class="text-center">Tên đại lý</th>
                                        <th scope="col" class="text-center">Mã</th>
                                        <th scope="col" class="text-center">Số điện thoại</th>
                                        <th scope="col" class="text-center">Trạng thái</th>
                                        <th scope="col" class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($agencies && count($agencies) > 0)
                                    @php($sn = ($agencies->perPage() * ($agencies->currentPage() - 1)) + 1)
                                    @foreach ($agencies as $key => $agency)
                    
                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        <td class="text-left">{{ $agency->name ?? '' }}</td>
                                        <td class="text-center">{{ $agency->code ?? '' }}</td>
                                        <td class="text-center">{{ $agency->phone ?? '' }}</td>
                                        <td class="text-center">{{ $agency->status ?? '' }}</td>
                                        <td class="text-center">
                                            <span type="button" class="badge badge-sm badge-primary" 
                                            data-toggle="modal" data-target="#agencyInfoModal" data-agency-id="{{ $agency->id }}">
                                                <i class="icon-eye"></i>
                                            </span>
                                            <span type="button" class="badge badge-sm badge-success" 
                                            data-toggle="modal" data-target="#crudAgencyModal" data-agency-id="{{ $agency->id }}">
                                                <i class="icon-pencil5"></i>
                                            </span>
                                            <span type="button" class="badge badge-sm badge-danger" 
                                            data-toggle="modal" data-target="#crudAgencyModal" data-agency-id="{{ -$agency->id }}">
                                                <i class="icon-trash"></i>
                                            </span>
                                        </td>
                                    </tr>
                    
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">(Không có dữ liệu)</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @include('admin.components.livewire-table-nav', ['collection' => $agencies])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>