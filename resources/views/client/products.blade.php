@extends('index')
@section('css')
    @vite(['resources/css/card-product.css'])
@endsection

@section('body')
<div class="container my-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <span>Hiển thị {{ $books->firstItem() }} đến {{ $books->lastItem() }} trong
                {{ $books->total() }} kết quả</span>
        </div>
        <div class="col-md-6 text-end">
            <form action="{{ route('index.index') }}" method="get" class="d-inline-block">
                <select class="form-select d-inline-block w-auto" name="filter" onchange="this.form.submit()">
                    <option>Sắp xếp</option>
                    <option value="price_asc" @selected(request('filter') == 'price_asc')>Giá: Thấp đến Cao</option>
                    <option value="price_desc" @selected(request('filter') == 'price_desc')>Giá: Cao đến Thấp</option>
                    <option value="name_asc" @selected(request('filter') == 'name_asc')>Tên: A-Z</option>
                    <option value="name_desc" @selected(request('filter') == 'name_desc')>Tên: Z-A</option>
                </select>
            </form>
        </div>
    </div>

    <div class="row">
        {{-- Cột sản phẩm --}}
        <div class="col-lg-9">
            <div class="row g-4">
                @foreach ($books as $book)
                    <div class="col-md-4 col-sm-6">
                        <div class="product-card h-100">
                            <div class="position-relative">
                                <img src="{{ asset('storage/' . $book->img) }}" alt="{{ $book->name }}">
                                <div class="product-overlay">
                                    <a href="{{ route('index.show', $book->book_id) }}">👁️</a>
                                    <form action="{{ route('cart.add', $book->book_id) }}" method="post">
                                        @csrf
                                        <button type="submit">🛒</button>
                                    </form>
                                </div>
                            </div>
                            <div class="product-title">{{ $book->name }}</div>
                            <div class="product-price">{{ number_format($book->price, 0, ',', '.') }} đ</div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>

        {{-- Cột bộ lọc --}}
        <div class="col-lg-3">
            <div class="card p-3">
                <h5 class="mb-3">Bộ lọc</h5>
                <form method="GET" action="{{ route('index.index') }}">
                    <label class="form-label">Giá</label>
                    <input type="range" class="form-range" min="0" max="500000" step="1000" name="price">

                    <label class="form-label mt-2">Tác giả</label>
                    <select class="form-select mb-2" name="author">
                        <option value="">Tất cả</option>
                        {{-- option tác giả --}}
                    </select>

                    <label class="form-label mt-2">Thể loại</label>
                    <select class="form-select mb-3" name="category">
                        <option value="">Tất cả</option>
                        {{-- option thể loại --}}
                    </select>

                    <button type="submit" class="btn btn-primary w-100">Lọc</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
