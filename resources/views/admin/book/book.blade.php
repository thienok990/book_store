@extends('admin.dashboard')
@section('title-admin', 'Danh sách Sản phẩm')
@section('header')
    @include('admin.components.AddBtn', [
        'title' => 'Danh sách Sản phẩm',
        'route' => route('book.create'),
        'button' => 'Thêm sản phẩm',
    ])
@endsection
@section('table')
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Thể loại</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Số lượng trong kho</th>
                <th>Ảnh</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->category_name }}</td>
                    <td>{{ $book->author_name }}</td>
                    <td>{{ number_format($book->price, 0, ',', '.') }} đ</td>
                    <td>{{ $book->stock }}</td>
                    <td><img src="{{ asset('storage/' . $book->img) }}" alt="Hình ảnh" style="height:50px;width:50px;"></td>
                    <td>

                        @include('admin.components.EditDeleteBtn', ['item' => $book, 'resource' => 'book'])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('content')
    {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection
