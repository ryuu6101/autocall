<div>
    <div wire:ignore.self class="modal fade" id="agencyInfoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Thông tin đại lý
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid py-5" wire:loading wire:target="modalSetup">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="spinner-border spinner-border-sm mr-2" role="status"></div>
                            <span class="ms-2">Vui lòng đợi</span>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="fit">Tên đại lý:</th>
                                    <td scope="row">{{ $agency->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Mã đại lý:</th>
                                    <td scope="row">{{ $agency->code ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Số điện thoại:</th>
                                    <td scope="row">{{ $agency->phone ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Địa chỉ:</th>
                                    <td scope="row">{{ $agency->address ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Mã máy scan:</th>
                                    <td scope="row">{{ $agency->scanner_code ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Trạng thái:</th>
                                    <td scope="row">{{ $agency->status ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Ghi chú:</th>
                                    <td scope="row">{{ $agency->note ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#agencyInfoModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-agency-id') ?? 0;
            @this.call('modalSetup', id);
        })
    })
</script>
@endpush
