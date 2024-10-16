<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                    Thống kê
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
                </div>

                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-bordered table-dark table-sm align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">STT</th>
                                        <th scope="col" class="text-center">Đại lý</th>
                                        <th scope="col" class="text-center">Số lượng nhập</th>
                                        <th scope="col" class="text-center">Số lượng đã bán</th>
                                        <th scope="col" class="text-center">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($staticals && count($staticals) > 0)
                                    @php($sn = ($staticals->perPage() * ($staticals->currentPage() - 1)) + 1)
                                    @foreach ($staticals as $key => $statical)

                                    <tr>
                                        <td class="text-center">{{ $sn++ }}</td>
                                        <td class="text-left">{{ $statical->agency->name ?? '' }}</td>
                                        <td class="text-center">{{ $statical->imported_amount ?? 0 }}</td>
                                        <td class="text-center">{{ $statical->sold_amount ?? 0 }}</td>
                                        <td class="text-center">{{ $statical->status ?? '' }}</td>
                                    </tr>

                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5" class="text-center">(Không có dữ liệu)</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @include('admin.components.livewire-table-nav', ['collection' => $staticals])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>