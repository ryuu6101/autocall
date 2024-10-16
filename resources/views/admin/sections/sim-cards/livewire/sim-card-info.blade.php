<div>
    <div wire:ignore.self class="modal fade" id="simCardInfoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content" wire:loading.remove wire:target="modalSetup">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Thông tin thẻ sim
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
                                    <th scope="row" class="fit">Số sim:</th>
                                    <td scope="row">{{ $sim_card->card_number ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Mã scan:</th>
                                    <td scope="row">{{ $sim_card->scan_code ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Gói cước:</th>
                                    <td scope="row">{{ $sim_card->package ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Hạn sử dụng:</th>
                                    <td scope="row">
                                        @if ($sim_card && $sim_card->duration)
                                        {{ $sim_card->duration }} ngày
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Ngày đăng ký/hết hạn:</th>
                                    <td scope="row">
                                        @if ($sim_card && $sim_card->register_date && $sim_card->expired_date)
                                        {{ $sim_card->register_date->format('d/m/Y') }} - 
                                        {{ $sim_card->expired_date>format('d/m/Y') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Giá tiền:</th>
                                    <td scope="row">
                                        @if ($sim_card && $sim_card->price)
                                        {{ $sim_card->price }} VNĐ
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Đại lý:</th>
                                    <td scope="row">{{ $sim_card->agency->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Trạng thái:</th>
                                    <td scope="row">{{ $sim_card->status ?? '' }}</td>
                                </tr>
                                </tr>
                                <tr>
                                    <th scope="row" class="fit">Trạng thái gửi OTP:</th>
                                    <td scope="row">{{ $sim_card->otp_status ?? '' }}</td>
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
        $('#simCardInfoModal').on('show.bs.modal', function(e) {
            var id = e.relatedTarget.getAttribute('data-sim-card-id') ?? 0;
            @this.call('modalSetup', id);
        })
    })
</script>
@endpush
