@extends('admin.dashboard')
@section('title-admin', 'Danh sách Sản phẩm')

@section('content')
    <div class="container-fluid p-4">

        {{-- Thống kê nhanh --}}
        <div class="row g-3 mb-3">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-primary text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Sản phẩm</h6>
                        <h4>{{ $totalProducts ?? 0 }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-success text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Đơn hàng tháng này</h6>
                        <h4>{{ $totalOrders ?? 0 }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-warning text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Tổng doanh thu</h6>
                        <h4>{{ number_format($totalRevenue ?? 0) }} đ</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-info text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Đơn hàng hôm nay</h6>
                        <h4>{{ $totalOrdersToday ?? 0 }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-secondary text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Doanh thu hôm nay</h6>
                        <h4>{{ number_format($todayRevenue ?? 0) }} đ</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card text-bg-danger text-center shadow-sm rounded-3">
                    <div class="card-body p-2">
                        <h6>Khách hàng</h6>
                        <h4>{{ $totalCustomers ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- Biểu đồ --}}
        <div class="card mb-3 shadow-sm" style="height:44vh;">
            <div class="card-header fw-bold">📈 Doanh thu theo tháng</div>
            <div class="card-body p-2">
                <canvas id="salesChart"
                        data-months='@json($months ?? [])'
                        data-revenues='@json($revenues ?? [])'
                        height="300"></canvas>
            </div>
        </div>

        {{-- Đơn hàng mới --}}
        <div class="card shadow-sm" style="height:35%;">
            <div class="card-header fw-bold">🛒 Đơn hàng mới nhất</div>
            <div class="card-body p-0 d-flex flex-column">
                <ul class="list-group list-group-flush flex-grow-1">
                    @forelse($recentOrders as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>#{{ $order->id }}</strong> - {{ $order->name }}
                                <span class="text-muted">({{ number_format($order->total_price) }} đ)</span>
                            </div>
                            <div class="mt-1 small text-muted">
                                🕒 Tạo: {{ $order->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }} |
                                🔄 Cập nhật: {{ $order->updated_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Không có đơn hàng mới.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        {{ $recentOrders->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('js')
    @vite(['resources/js/chart.js'])
@endsection
