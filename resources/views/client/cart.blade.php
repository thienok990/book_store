@extends('index')
@section(section: 'title', content: 'Giỏ hàng')
@section('css')
    @vite(['resources/css/cart.css'])
@endsection
@section('body')
    <div class="container py-5">
        <form action="{{ route('checkout.index') }}" method="get">
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="mb-4">Giỏ hàng của bạn</h4>
                            @if ($cart_items->isEmpty())
                                <div class="d-flex justify-content-between align-items-center cart-item w-100">
                                    <h4>Bạn chưa thêm sản phẩm nào vào giỏ hàng</h4>
                                </div>
                            @else
                                @foreach ($cart_items as $item)
                                    <div class="d-flex justify-content-between align-items-center cart-item w-100">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" value="{{ $item->id }}" name="ids[]">
                                            <img src="{{ asset('storage/' . $item->img) }}" alt="Product"
                                                class="item-img me-3">
                                            <div class="product-info">
                                                <h6 class="mb-1">{{ $item->name }}</h6>
                                                <small class="price" id="price{{ $item->id }}">Giá:
                                                    {{ number_format($item->price, 0, ',', '.') }}đ</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <input type="number" class="form-control me-3 quantity" name="quantity"
                                                id="{{ $item->id }}" value="{{ $item->quantity }}" min="1"
                                                style="width: 60px;">
                                            <strong class="me-3 text-primary total-price"
                                                id="total-price{{ $item->id }}">
                                                {{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ
                                            </strong>
                                            <button class="btn btn-sm btn-outline-danger btnDelete"
                                                data-id="{{ $item->id }}"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-3">Tổng số giỏ hàng</h5>
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between py-2">
                                    <strong>Tổng tiền</strong>
                                    <strong id="cart-total">0đ</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary w-100" id="btn" disabled>Đặt Hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    @vite(['resources/js/cart.js'])
@endsection
