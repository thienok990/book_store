@extends('admin.dashboard')
@vite(['resources/css/book.css'])
@section('table-header')
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
@endsection

@section('table-content')
    @foreach ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->category_name }}</td>
            <td>{{ $book->author_name }}</td>
            <td>{{ number_format($book->price, 0, ',', '.') }} đ</td>
            <td>{{ $book->stock }}</td>
            <td><img src="{{ asset('storage/' . $book->img) }}" alt="Hình ảnh"></td>
            <td>
                
                @include('admin.components.EditDeleteBtn', ['item' => $book, 'type' => 'book'])
            </td>
        </tr>
    @endforeach
   
@endsection
@section('content')
{{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
@endsection