@php
    $isEdit = $mode === 'edit';
@endphp

<div class="row g-3">
    <div class="col-md-6">
        <label for="name" class="form-label">Tên Tác giả</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name ?? '') }}"
            required>
    </div>
</div>
