@extends('admin.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="mb-4 text-center">Thêm sản phẩm</h3>

                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.book.form', [
                        'mode' => 'create',
                        'book' => null,
                        'authors' => $authors,
                        'categories' => $categories,
                    ])
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('book.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Trở lại
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> Thêm sản phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.ui.view.editable.element.style.minHeight = '300px';
            })
            .catch(console.error);
    </script>
@endsection
