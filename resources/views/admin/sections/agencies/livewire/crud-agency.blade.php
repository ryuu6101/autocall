<div>
    <div wire:ignore.self class="modal fade" id="crudAgencyModal" tabindex="-1" aria-hidden="true">
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
                        Thêm mới đại lý
                        @elseif ($action == 'update')
                        Chỉnh sửa đại lý
                        @elseif ($action == 'delete')
                        Xác nhận
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent={{ $action }} id="crudAgencyForm">

                        @if ($action == 'delete')
                        <div class="row">
                            <div class="col">
                                <span>Bạn có muốn xóa {{ $agency->name }}?</span>
                            </div>
                        </div>
                        @else
                        <div class="row">

                            <div class="col-12 mb-2">
                                <label>Tên đại lý</label>
                                <input type="text" class="form-control" wire:model.blur="name">
                                @error('name')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-2">
                                <label>Mã đại lý</label>
                                <input type="text" class="form-control" wire:model.blur="code">
                                @error('code')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-6 mb-2">
                                <label>Số điện thoại</label>
                                <input type="number" class="form-control hidden-arrow" wire:model.blur="phone">
                                @error('phone')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" wire:model.blur="address">
                                @error('address')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label>Ghi chú</label>
                                <textarea class="form-control" wire:model.blur="note" wire:ignore.self></textarea>
                                @error('note')
                                <span class="text-danger ml-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
                <div class="modal-footer">
                    @if ($action == 'delete')
                    <button type="submit" class="btn btn-danger" form="crudAgencyForm" wire:loading.attr="disabled">Đồng ý</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:loading.attr="disabled">Hủy</button>
                    @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:loading.delay.longer.attr="disabled">
                        Đóng
                    </button>
                    <button type="submit" class="btn btn-primary" form="crudAgencyForm" wire:loading.delay.longer.attr="disabled">
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
        $('#crudAgencyModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-agency-id') ?? 0;
            @this.call('modalSetup', id);
        })

        $(document).on('close-crud-agency-modal', function() {
            $('#crudAgencyModal').modal('hide');
        })
    })
</script>
@endpush
