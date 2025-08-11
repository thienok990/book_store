@extends('admin.dashboard')
@section('title-admin', 'Danh sách Tác Giả')
@section('header')
    @include('admin.components.AddBtn', [
        'title' => 'Danh sách Tác Giả',
        'route' => route('author.create'),
        'button' => 'Thêm Tác Giả',
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
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->book_count }}</td>
                    <td>
                        @include('admin.components.EditDeleteBtn', ['item' => $author, 'resource' => 'author'])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('content')
    {{ $authors->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection
