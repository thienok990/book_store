@extends('client.user')
@section(section: 'title', content: 'Đơn hàng')
@section('content')
    <div class="container mt-4 col-md-9">
        @foreach ($order_details as $details)
            @php
                // Lấy phần tử đầu mỗi nhóm để hiển thị status và tổng tiền
                $first = $details[0];
            @endphp
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            @if ($first->status === 'shipping')
                                <span class="order-status text-warning"><i class="bi bi-truck"></i>
                                    Đơn hàng đang vận chuyển đến bạn
                                </span>
                            @elseif($first->status === 'completed')
                                <span class="order-status"><i class="bi bi-truck"></i>
                                    Đơn hàng đã giao thành công
                                </span>
                                <span class="text-danger fw-bold ms-2">HOÀN THÀNH</span>
                            @elseif($first->status === 'pending')
                                <span class="order-status text-secondary"><i class="bi bi-truck"></i>
                                    Đơn hàng đang xử lý
                                </span>
                            @else
                                <span class="order-status text-danger"><i class="bi bi-truck"></i>
                                    Đơn hàng đã bị huỷ
                                </span>
                            @endif
                        </div>
                    </div>
                    @foreach ($details as $detail)
                        <!-- Sản phẩm 1 -->
                        <div class="d-flex mb-3 order-item">
                            <img src="{{ asset('storage/' . $detail->img) }}" alt="sp1" class="product-img me-3" loading="lazy">
                            <div class="flex-grow-1">
                                <div class="product-title">{{ $detail->name }}
                                </div>
                                <div class="text-muted small">x{{ $detail->quantity }}
                                    <span class="price-discount">{{ number_format($detail->price, 0, ',', '.') }} đ</span>
                                </div>

                            </div>
                            <div class="text-end">
                                <div class="price-discount">{{ number_format($detail->total, 0, ',', '.') }} đ</div>
                            </div>
                        </div>
                        <!-- Tổng tiền và nút -->
                    @endforeach
                    <div class="d-flex justify-content-between align-items-center mt-4 pt-2 border-top">
                        <div></div>
                        <div class="text-end">
                            <div><strong>Thành tiền: <span
                                        class="price-discount fs-5">{{ number_format($detail->total_price, 0, ',', '.') }}
                                        đ</span></strong></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
