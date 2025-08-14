@extends('index')
@section('css')
    @vite(['resources/css/card-product.css'])
@endsection
@section('body')
    <div class="container-fluid my-5">

        <div class="row">
            {{-- Chừa khoảng trống nhỏ bên trái --}}
            <div class="col-md-1"></div>

            {{-- Sản phẩm bên trái --}}
            <div class="col-md-9">
                <div class="d-flex align-items-center mb-3 flex-wrap gap-2 justify-content-end">
                    <span class="mb-2 mb-md-0">
                        Hiển thị {{ $books->firstItem() }} đến {{ $books->lastItem() }} trong {{ $books->total() }} kết quả
                    </span>
                </div>

                <div class="row g-3">
                    @foreach ($books as $book)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-card h-100 p-2">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $book->img) }}" alt="{{ $book->name }}" />
                                    <div class="product-overlay">
                                        <a href="{{ route('index.show', $book->book_id) }}"
                                            style="text-decoration: none">👁️</a>
                                        <button type="submit" class="btnAdd" data-id="{{ $book->book_id }}">🛒</button>
                                    </div>
                                </div>
                                <div class="product-title" style="font-size: 0.9rem; line-height: 1.2;">
                                    {{ $book->name }}
                                </div>
                                <div class="product-price" style="font-size: 0.85rem;">
                                    {{ number_format($book->price, 0, ',', '.') }} đ
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>

            {{-- Bộ lọc bên phải --}}
            <div class="col-md-2 pe-0">
                @include('client.components.filter', ['categories' => $categories, 'authors' => $authors])
            </div>
        </div>

    </div>
@endsection
@section('js')
    @vite(['resources/js/cart.js'])
    @vite(['resources/js/filter.js'])
@endsection
