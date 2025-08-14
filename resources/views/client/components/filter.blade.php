<div class="">
    <div class="card p-3">
        <h5 class="mb-3">Bộ lọc</h5>
        <form action="{{ route('index.index') }}" method="get" id="filterForm">
            <select class="form-select mb-3 optionSelect" name="filter">
                <option>Sắp xếp</option>
                <option value="price_asc" @selected(request('filter') == 'price_asc')>Giá: Thấp đến Cao</option>
                <option value="price_desc" @selected(request('filter') == 'price_desc')>Giá: Cao đến Thấp</option>
                <option value="name_asc" @selected(request('filter') == 'name_asc')>Tên: A-Z</option>
                <option value="name_desc" @selected(request('filter') == 'name_desc')>Tên: Z-A</option>
            </select>
            <label class="form-label fw-bold">Khoảng giá (đ)</label>
            <div class="mb-3">
                {{-- Thanh kéo giá min --}}
                <input type="range" class="form-range" name="min_price" min="0" max="1500000" step="10000"
                    value="{{ request('min_price', 0) }}"
                    oninput="document.getElementById('minPriceVal').innerText = Number(this.value).toLocaleString()">
                <small>Min: <span id="minPriceVal">{{ number_format(request('min_price', 0), 0, ',', '.') }}</span>
                    đ</small>

                {{-- Thanh kéo giá max --}}
                <input type="range" class="form-range mt-2" name="max_price" min="0" max="1500000"
                    step="10000" value="{{ request('max_price', 1500000) }}" 
                    oninput="document.getElementById('maxPriceVal').innerText = Number(this.value).toLocaleString()">
                <small>Max: <span
                        id="maxPriceVal">{{ number_format(request('max_price', 1500000), 0, ',', '.') }}</span>
                    đ</small>
            </div>

            {{-- Lọc theo tác giả --}}
            <label class="form-label fw-bold ">Tác giả</label>
            <select class="form-select mb-3 authorSelect" name="author_id">
                <option value="">-- Chọn tác giả --</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            {{-- Lọc theo tác giả --}}
            <label class="form-label fw-bold">Thể loại</label>
            <select class="form-select mb-3 categorySelect" name="category_id">
                <option value="">-- Chọn thể loại --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
</div>
