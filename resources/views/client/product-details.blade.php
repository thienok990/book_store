@extends('index')
@section(section: 'title', content: 'Chi tiết sản phẩm')
@section('body')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4 shadow-sm p-4 rounded bg-white">
                    <!-- Cột hình ảnh -->
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('storage/' . $book->img) }}" alt="Bìa sách"
                            class="img-fluid rounded shadow-sm mb-3">
                        <div class="text-danger fw-bold fs-4">
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
                                <input type="number" class="form-control text-center" value="1" min="1"
                                    name="quantity">
                            </div>
                        </div>
                        <!-- Hành động -->
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-dark px-4 btnAdd" data-id="{{$book->book_id}}">🛒 Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @vite(['resources/js/cart.js'])
@endsection
