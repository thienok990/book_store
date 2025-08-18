<div class="product-carousel-wrapper p-3 border rounded position-relative">
    <h3 class="mb-3">Các sản phẩm khác</h3>
    <div id="multiItemCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($books->chunk(6) as $chunkIndex => $bookChunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row g-3">
                        @foreach ($bookChunk as $book)
                            <div class="col-lg-2 col-md-4 col-sm-6">
                                <div class="product-card h-100 p-2">
                                    <a href="{{ route('index.show', ['id' => $book->id, 'slug' => $book->slug]) }}"
                                        style="text-decoration: none">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $book->img) }}" alt="{{ $book->name }}"
                                                class="img-fluid" loading="lazy" />
                                            @if ($book->stock === 0)
                                                <div class="ribbon-soldout"><span>HẾT HÀNG</span></div>
                                            @endif
                                        </div>
                                        <div class="product-title mt-2 text-black">{{ $book->name }}</div>
                                        <div class="product-price">{{ number_format($book->price, 0, ',', '.') }} đ</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Nút prev/next chỉ vừa icon, không che card -->
        <button
            class="position-absolute top-50 start-0 translate-middle-y btn btn-secondary btn-sm d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button
            class="position-absolute top-50 end-0 translate-middle-y btn btn-secondary btn-sm d-flex align-items-center justify-content-center"
            style="width:40px; height:40px;" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
