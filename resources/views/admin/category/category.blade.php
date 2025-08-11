@extends('admin.dashboard')
@section('title-admin', 'Danh sách Thể loại')
@section('header')
    @include('admin.components.AddBtn', [
        'title' => 'Danh sách Thể loại',
        'route' => route('category.create'),
        'button' => 'Thêm Thể loại',
    ])
@endsection
@section('table')
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
             <tr>
        <th>STT</th>
        <th>Thể loại</th>
        <th>Số lượng sách</th>
        <th></th>
    </tr>
        </thead>
        <tbody>
             @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->book_count }}</td>
            <td>
                @include('admin.components.EditDeleteBtn', ['item' => $category, 'resource' => 'category'])
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
@endsection

@section('content')
    {{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection
