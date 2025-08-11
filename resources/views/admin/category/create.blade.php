@extends('admin.dashboard')
@section('title-admin', 'Thêm Thể loại')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-4 text-center">Thêm Thể loại</h3>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                @include('admin.category.form', [
                    'mode' => 'create',
                    'category' => null,
                ])
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Trở lại
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
