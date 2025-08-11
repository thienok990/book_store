@extends('admin.dashboard')
@section('title-admin', 'Sửa Thể loại')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h3 class="mb-4 text-center">Chỉnh sửa Tác giả</h3>

                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.category.form', [
                        'mode' => 'edit',
                        'category' => $category,
                    ])
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Trở lại
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save"></i> Lưu thay đổi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection