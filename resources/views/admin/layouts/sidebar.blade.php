<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <img src="{{ asset('images/clipart3643767.png') }}" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">{{ auth()->user()->fullname }}</div>
                        {{-- <div class="font-size-sm line-height-sm opacity-50">
                            Senior developer
                        </div> --}}
                    </div>

                    <div class="ml-3 align-self-center">
                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>

                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Menu</div> 
                    <i class="icon-menu" title="Main"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agencies.index') }}" class="nav-link agencies">
                        <i class="icon-home4"></i>
                        <span>Đại lý</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sim-cards.index') }}" class="nav-link sim-cards">
                        <i class="mi-sim-card"></i>
                        <span>Thẻ sim</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staticals.index') }}" class="nav-link staticals">
                        <i class="icon-stats-bars2"></i>
                        <span>Thống kê</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        let menu = {{ Js::from($menu['sidebar'] ?? '') }};
        $('.nav-link.'+menu).addClass('active');
    })
</script>
@endpush