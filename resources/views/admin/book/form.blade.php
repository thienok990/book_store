@php
    $isEdit = $mode === 'edit';
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $book->name ?? '') }}"
            required>
    </div>

    <div class="col-md-3">
        <label for="category_id" class="form-label">Thể loại</label>
        <select class="form-select" name="category_id" id="category_id" required>
            <option disabled selected>-- Chọn thể loại --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ isset($book) && $book->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="author_id" class="form-label">Tác giả</label>
        <select class="form-select" name="author_id" id="author_id" required>
            <option disabled selected>-- Chọn tác giả --</option>
            @foreach ($authors as $auth)
                <option value="{{ $auth->id }}"
                    {{ isset($book) && $book->author_id == $auth->id ? 'selected' : '' }}>
                    {{ $auth->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label for="price" class="form-label">Giá</label>
        <input type="text" class="form-control" name="price" id="price" min="1"
            value="{{ old('price', isset($book->price) ? number_format($book->price, 0, ',', '.') : '') }}" required>

    </div>

    <div class="col-md-4">
        <label for="stock" class="form-label">Số lượng</label>
        <input type="number" class="form-control" name="stock" id="stock" min="0"
            value="{{ old('stock', $book->stock ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label for="img" class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="img" id="img">
        @if ($isEdit && isset($book->img))
            <img src="{{ asset('storage/' . $book->img) }}" class="img-thumbnail mt-2" style="max-width: 150px;">
        @endif
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" name="description" id="editor">{{ old('description', $book->description ?? '') }}</textarea>
    </div>
</div>
