@extends('admin.dashboard')
@section('table-header')
    <tr>
        <th>STT</th>
        <th>Thể loại</th>
        <th>Số lượng sách</th>
        <th></th>
    </tr>
@endsection

@section('table-content')
    @foreach ($authors as $author)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$author->name}}</td>
            <td>{{$author->book_count}}</td>
            <td>
                @include('admin.components.EditDeleteBtn', ['item' => $author, 'type' => 'author'])
            </td>
        </tr>
    @endforeach
@endsection