@php
    $id = $item->book_id ?? $item->id;
@endphp

<div class="d-flex justify-content-around">
    <a href="{{ route("{$resource}.edit", $id) }}" class="btn btn-warning btn-sm"
        style="width:40px;height:40px;display: flex; justify-content: center; align-items: center;">Sửa</a>
    <form method="POST" action="{{ route("{$resource}.destroy", $id) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit" style="width:40px;height:40px;">Xóa</button>
    </form>
</div>
