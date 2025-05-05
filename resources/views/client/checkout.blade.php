@vite(['resources/js/apiVN.js'])
@extends('index')
@section(section: 'title', content: 'Thanh toán')
@section('body')
    <div class="container my-5">
        <div class="row">
            <form action="{{ route('checkout.store') }}" method="POST" class="row">
                <div class="col-md-7">
                    <h4 class="mb-4">Shipping Address</h4>
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label>Tên*</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                        <div class="col">
                            <label>Họ*</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label>Email*</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="col">
                            <label>Số điện thoại*</label>
                            <input type="number" class="form-control" name="phone" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="province">Tỉnh*</label>
                            <select id="province" name="province_id" class="form-select">
                                <option value="">Tỉnh</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="province">Quận/Huyện*</label>
                            <select id="district" name="district_id" class="form-select">
                                <option value="">Quận/huyện</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="ward">Phường/Xã*</label>
                            <select id="ward" name="ward_id" class="form-select">
                                <option value="">Xã/phường</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Địa chỉ cụ thể*</label>
                        <textarea class="form-control" name="description" placeholder="Địa chỉ cụ thể" required></textarea>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4 class="mb-4">Giỏ hàng của bạn</h4>
                    <div class="border p-4 rounded bg-light">
                        @foreach ($cart_items as $item)
                            <div class="d-flex justify-content-between mb-2">
                                <input type="hidden" name="ids[]" value="{{ $item->id }}">
                                <div>
                                    <strong>{{ $item->name }}</strong><br>
                                </div>
                                <div>
                                    <small>x{{ $item->quantity }}</small>
                                    {{ number_format($item->price, 0, ',', '.') }}đ
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Tổng cộng</span>
                            <span> <strong id="cart-total">{{ number_format($total_price, 0, ',', '.') }}đ</strong></span>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 mt-3">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
