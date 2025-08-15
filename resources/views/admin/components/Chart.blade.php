@extends('admin.dashboard')
@section('title-admin', 'Danh sách Sản phẩm')
@section('content')
    <!-- Content -->
    <div class="container-fluid p-4">
        {{-- Thẻ thống kê --}}
        <div class="row mb-4">
            <div class="col-md-2">
                <div class="card text-bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm</h5>
                        <h3>{{ $totalProducts ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Đơn hàng</h5>
                        <h3>{{ $totalOrders ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Tổng doanh thu</h5>
                        <h3>{{ number_format($totalRevenue ?? 0) }} đ</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Đơn hàng hôm nay</h5>
                        <h3>{{ $totalOrdersToday ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Doanh thu hôm nay</h5>
                        <h3>{{ number_format($todayRevenue ?? 0) }} đ</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card text-bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Khách hàng</h5>
                        <h3>{{ $totalCustomers ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Biểu đồ --}}
        <div class="card mb-4">
            <div class="card-header">Doanh thu theo tháng</div>
            <div class="card-body">
                <canvas id="salesChart" height="100"></canvas>
            </div>
        </div>

        {{-- Đơn hàng mới --}}
        <div class="card">
            <div class="card-header">Đơn hàng mới nhất</div>
            <ul class="list-group list-group-flush">
                @forelse($recentOrders as $order)
                    <li class="list-group-item">
                        <strong>Mã:</strong> {{ $order->id }} |
                        <strong>Khách:</strong> {{ $order->name }} |
                        <strong>Tổng:</strong> {{ number_format($order->total_price) }} đ
                    </li>
                @empty
                    <li class="list-group-item text-muted">Không có đơn hàng mới.</li>
                @endforelse
            </ul>
        </div>
    </div>
    </div>
@endsection

@section('js')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months ?? []),
                datasets: [{
                    label: 'Doanh thu',
                    data: @json($revenues ?? []),
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3,
                    fill: false
                }]
            }
        });
    </script>

@endsection
