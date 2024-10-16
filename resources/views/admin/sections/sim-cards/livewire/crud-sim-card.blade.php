<div>
    <div wire:ignore.self class="modal fade" id="crudSimCardModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" wire:loading wire:target="modalSetup">
                <div class="container-fluid py-5">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="spinner-border spinner-border-sm mr-2" role="status"></div>
                        <span class="ms-2">Vui lòng đợi</span>
                    </div>
                </div>
            </div>

            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($action == 'create')
                        Thêm mới thẻ sim
                        @elseif ($action == 'update')
                        Chỉnh sửa thẻ sim
                        @elseif ($action == 'delete')
                        Xác nhận
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent={{ $action }} id="crudSimCardForm">

                        @if ($action == 'delete')
                        <div class="row">
                            <div class="col">
                                <span>Bạn có muốn xóa thẻ sim: {{ $sim_card->card_number }}</span>
                            </div>
                        </div>
                        @else
                        <div class="row">

                            <div class="col-6 mb-3">
                                <label>Số sim</label>
                                <input type="number" class="form-control hidden-arrow" wire:model.blur="card_number">
                                @error('card_number')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label>Mã scan</label>
                                <input type="text" class="form-control" wire:model.blur="scan_code">
                                @error('scan_code')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4 mb-3">
                                <label>Gói cước</label>
                                <input type="text" class="form-control" wire:model.blur="package">
                                @error('package')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4 mb-3">
                                <label>Hạn sử dụng (Ngày)</label>
                                <input type="number" class="form-control hidden-arrow" wire:model.blur="duration">
                                @error('duration')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4 mb-3">
                                <label>Giá tiền</label>
                                <input type="number" class="form-control hidden-arrow" wire:model.blur="price">
                                @error('price')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label>Đại lý</label>
                                @if ($agencies->count() > 0)
                                <select class="form-control custom-select" wire:model.blur="agency_id">
                                    @foreach ($agencies as $agency)
                                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control" disabled placeholder="(Không có dữ liệu)">
                                @endif
                                @error('agency_id')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label>Loại thẻ sim</label>
                                @if ($sim_types->count() > 0)
                                <select class="form-control custom-select" wire:model.blur="sim_type_id">
                                    @foreach ($sim_types as $sim_type)
                                    <option value="{{ $sim_type->id }}">{{ $sim_type->title }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control" disabled placeholder="(Không có dữ liệu)">
                                @endif
                                @error('sim_type_id')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
                <div class="modal-footer">
                    @if ($action == 'delete')
                    <button type="submit" class="btn btn-danger" form="crudSimCardForm" wire:loading.attr="disabled">Đồng ý</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:loading.attr="disabled">Hủy</button>
                    @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:loading.delay.longer.attr="disabled">
                        Đóng
                    </button>
                    <button type="submit" class="btn btn-primary" form="crudSimCardForm" wire:loading.delay.longer.attr="disabled"
                    @disabled($agencies->count() <= 0 || $sim_types->count() <= 0)>
                        <span class="spinner-border spinner-border-sm mr-2" wire:loading.delay.longer></span>
                        <span wire:loading.delay.longer.remove><i class="icon-floppy-disk mr-2"></i></span>
                        Lưu
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#crudSimCardModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-sim-card-id') ?? 0;
            @this.call('modalSetup', id);
        })

        $(document).on('close-crud-sim-card-modal', function() {
            $('#crudSimCardModal').modal('hide');
        })
    })
</script>
@endpush
