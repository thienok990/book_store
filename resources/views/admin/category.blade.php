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
    @foreach ($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->book_count}}</td>
            <td>
                @include('admin.components.EditDeleteBtn', ['item' => $category, 'type' => 'category'])
            </td>
        </tr>
    @endforeach
@endsection