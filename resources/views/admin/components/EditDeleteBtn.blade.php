@php
    $deleteRoute = '';
    $editRoute = '';
    if ($type == "book") {
        $deleteRoute = route('book.destroy', $item->book_id);
        $editRoute = route('book.edit', $item->book_id);
    } elseif ($type == 'category') {
        $deleteRoute = route('category.destroy', $item->id);
        $editRoute = route('category.edit', $item->id);
    } else {
        $deleteRoute = route('author.destroy', $author->id);
        $editRoute = route('author.edit', $item->id);
    }
@endphp

<div class="d-flex justify-content-around">
    <a href="{{ $editRoute }}" class="btn btn-warning btn-sm"
        style="width:40px;height:40px;display: flex; justify-content: center; align-items: center;">Sửa</a>
    <form method="POST" action="{{ $deleteRoute }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit" style="width:40px;height:40px;">Xóa</button>
    </form>
</div>
