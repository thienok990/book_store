@extends('index')
@section('css')
    @vite(['resources/css/product-detail.css'])
@endsection
@section(section: 'title', content: 'Chi tiết sản phẩm')
@section('body')
    <div class="py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4 shadow-sm p-4 rounded bg-white">
                    <!-- Cột hình ảnh -->

                    <div class="col-md-5 text-center position-relative">
                        <div class="position-relative d-inline-block">
                            <img src="{{ asset('storage/' . $book->img) }}" alt="Bìa sách" loading="lazy"
                                class="img-fluid rounded shadow-sm mb-3">

                            @if ($book->stock === 0)
                                <div class="overlay-soldout">
                                    <span>❌ HẾT HÀNG ❌</span>
                                </div>
                            @endif
                        </div>

                        <div class="text-danger fw-bold fs-4 mt-2">
                            {{ number_format($book->price, 0, ',', '.') }} đ
                        </div>
                    </div>

                    <!-- Cột thông tin sách -->
                    <div class="col-md-7">
                        <h3 class="fw-bold mb-2">{{ $book->name }}</h3>
                        <p class="text-muted mb-4">Tác giả: <strong>{{ $book->author_name }}</strong></p>

                        <div class="mb-4" style="text-align: justify; line-height: 1.7;">
                            {!! $book->description !!}
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Số lượng:</label>
                            <div class="input-group" style="max-width: 160px;">
                                <input type="number" class="form-control text-center" value="1" min="1"form="checkoutForm"
                                    name="quantity" max="{{ $book->stock }}">
                            </div>
                        </div>
                        <!-- Hành động -->
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-dark px-4 btnAdd" data-id="{{ $book->book_id }}"
                                @if ($book->stock === 0) disabled @endif>🛒 Thêm vào giỏ</button>
                            <form id="checkoutForm" action="{{ route('checkout.index') }}" method="get">
                                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                                <button type="submit" class="btn btn-primary px-4"
                                    @if ($book->stock === 0) disabled @endif>Đặt Hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            @include('client.components.carousel', ['books' => $bookRecommends])
        </div>
    </div>

@endsection
@section('js')
    @vite(['resources/js/product-details.js'])
    @vite(['resources/js/quantity.js'])
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('error'))
                showAlert(@json(session('error')), 'error');
            @endif
        });
    </script>
@endsection
