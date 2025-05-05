<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    @php
        $resource = request()->segment(2); // book, author, category
        $isEdit = $mode === 'edit';
        $item = $$resource ?? null;
    @endphp

    <div class="container mt-4">
        <h3>{{ $isEdit ? 'Chỉnh sửa' : 'Thêm mới' }}
            {{ $resource === 'book' ? 'sản phẩm' : ($resource === 'category' ? 'Thể loại' : 'Tác giả') }}
        </h3>

        <form action="{{ $isEdit ? route($resource . '.update', $item->id ?? '') : route($resource . '.store') }}"
            method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            @if ($isEdit)
                @method('PUT')
            @endif

            {{-- Tên --}}
            <div class="mb-3">
                <label for="name" class="form-label">
                    {{ $resource === 'book' ? 'Tên sản phẩm' : ($resource === 'category' ? 'Tên thể loại' : 'Tên tác giả') }}
                </label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $item->name ?? '') }}" required>
            </div>

            {{-- Nếu là sách --}}
            @if ($resource === 'book')
                {{-- Thể loại --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Thể loại</label>
                    <select class="form-select" name="category_id" id="category_id" required>
                        <option disabled selected>-- Chọn thể loại --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ isset($item) && $item->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tác giả --}}
                <div class="mb-3">
                    <label for="author_id" class="form-label">Tác giả</label>
                    <select class="form-select" name="author_id" id="author_id" required>
                        <option disabled selected>-- Chọn tác giả --</option>
                        @foreach ($authors as $auth)
                            <option value="{{ $auth->id }}"
                                {{ isset($item) && $item->author_id == $auth->id ? 'selected' : '' }}>
                                {{ $auth->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Giá --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="number" class="form-control" name="price" id="price" min="1"
                        value="{{ old('price', $item->price ?? '') }}" required>
                </div>

                {{-- Số lượng --}}
                <div class="mb-3">
                    <label for="stock" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" name="stock" id="stock" min="1"
                        value="{{ old('stock', $item->stock ?? '') }}" required>
                </div>

                {{-- Mô tả --}}
                <div class="mb-3">
                    <label for="editor" class="form-label">Mô tả</label>
                    <textarea class="form-control" name="description" id="editor" rows="200">
                                    {{ old('description', $item->description ?? '') }}
                                </textarea>
                </div>

                {{-- Ảnh --}}
                <div class="mb-3">
                    <label for="img" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="img" id="img">
                    @if ($isEdit && isset($item->img))
                        <div class="mt-2">
                            <label>Ảnh hiện tại:</label><br>
                            <img src="{{ asset('storage/' . $item->img) }}" alt="Ảnh sản phẩm"
                                style="max-width: 150px; border-radius: 5px;">
                        </div>
                    @endif
                </div>
            @endif

            {{-- Nút hành động --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route($resource . '.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Trở lại
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ $isEdit ? 'Lưu' : ($resource === 'book' ? 'Thêm sản phẩm' : 'Thêm') }}
                </button>
            </div>
        </form>
    </div>

    {{-- CKEditor --}}
    @if ($resource === 'book')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
