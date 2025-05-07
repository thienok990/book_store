@php
    $resource = request()->segment(2); // book, author, category
    $isEdit = $mode === 'edit';
    $item = $$resource ?? null;
    if ($resource === 'book') {
        $label = 'Thêm sản phẩm';
    } elseif ($resource === 'category') {
        $label = 'Thêm Thể loại';
    } else {
        $label = 'Thêm Tác giả';
    }
@endphp

@extends('admin.dashboard')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
@endsection

@section('no-header')
@endsection

@section('no-content')
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="mb-4 text-center">
                    {{ $isEdit ? 'Chỉnh sửa' : 'Thêm mới' }}
                    {{ $resource === 'book' ? 'sản phẩm' : ($resource === 'category' ? 'Thể loại' : 'Tác giả') }}
                </h3>

                <form action="{{ $isEdit ? route($resource . '.update', $item->id ?? '') : route($resource . '.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">
                                {{ $resource === 'book' ? 'Tên sản phẩm' : ($resource === 'category' ? 'Tên thể loại' : 'Tên tác giả') }}
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $item->name ?? '') }}" required>
                        </div>

                        @if ($resource === 'book')
                            <div class="col-md-3">
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

                            <div class="col-md-3">
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

                            <div class="col-md-4">
                                <label for="price" class="form-label">Giá</label>
                                <input type="number" class="form-control" name="price" id="price" min="1"
                                    value="{{ old('price', $item->price ?? '') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="stock" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" name="stock" id="stock" min="1"
                                    value="{{ old('stock', $item->stock ?? '') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="img" class="form-label">Ảnh</label>
                                <input type="file" class="form-control" name="img" id="img">
                                @if ($isEdit && isset($item->img))
                                    <img src="{{ asset('storage/' . $item->img) }}" class="img-thumbnail mt-2"
                                        style="max-width: 150px;">
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Mô tả</label>
                                <textarea class="form-control" name="description" id="editor">
                                {{ old('description', $item->description ?? '') }}
                            </textarea>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route($resource . '.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Trở lại
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> {{ $isEdit ? 'Lưu' : $label }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- CKEditor --}}
    @if ($resource === 'book')
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor')).then(editor => {
                    const editable = editor.ui.view.editable.element;
                    editable.style.minHeight = '300px';
                    editable.style.height = '300px';

                    // Lắng nghe sự kiện focus để ngăn sự thay đổi chiều cao
                    editable.addEventListener('focus', () => {
                        editable.style.height = '300px';
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+gkk93KXQ5VvoEH3sl0sibVcOQVnN" crossorigin="anonymous">
    </script>
@endsection
