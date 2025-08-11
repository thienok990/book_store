@extends('admin.dashboard')
@section('title-admin', 'Thêm Tác giả')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h3 class="mb-4 text-center">Thêm Tác giả</h3>

            <form action="{{ route('author.store') }}" method="POST">
                @csrf
                @include('admin.author.form', [
                    'mode' => 'create',
                    'author' => null,
                ])
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('author.index') }}" class="btn btn-outline-secondary">
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