@extends('index')
@section('css')
    @vite(['resources/css/card-product.css'])
@endsection
@section('body')
    <div class="container">
        <div class="mb-4">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0 pt-3">
                    <form action="{{ route('index.index') }}" method="get">
                        <span class="me-2">Hiển thị {{ $books->firstItem() }} đến {{ $books->lastItem() }} trong
                            {{ $books->total() }} kết quả</span>
                        <select class="form-select d-inline-block w-auto" name="filter" onchange="this.form.submit()">
                            <option>Sắp xếp</option>
                            <option value="price_asc" @selected(request('filter') == 'price_asc')>Giá: Thấp đến Cao </option>
                            <option value="price_desc" @selected(request('filter') == 'price_desc')>Giá: Cao đến Thấp </option>
                            <option value="name_asc" @selected(request('filter') == 'name_asc')>Tên: A-Z</option>
                            <option value="name_desc" @selected(request('filter') == 'name_desc')>Tên: Z-A</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="container my-5">
                <div class="row g-4">
                    @foreach ($books as $book)
                        <div class="col-md-3 col-sm-6">
                            <div class="product-card h-100">
                                <div class="position-relative ">
                                    <img src="{{ asset('storage/' . $book->img) }}" alt="Jungle Moc Slip-on">
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
            </div>
            {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
