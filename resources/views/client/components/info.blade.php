@extends('client.user')

@section(section: 'title', content: 'Thông tin cá nhân')
@section('content')
    <div class="profile-section mt-4">
        <h4>Hồ Sơ Của Tôi</h4>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tên -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Nhập tên"
                        value="{{ old('name', $user->name) }}">
                </div>
            </div>

            <!-- Email -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                        readonly>
                </div>
            </div>

            <!-- Số điện thoại -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="tel" name="phone" class="form-control" placeholder="Nhập số điện thoại"
                        pattern="[0-9]{10}" maxlength="10" inputmode="numeric"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="{{ old('phone', $user->phone) }}">
                </div>
            </div>

            <!-- Giới tính -->
            <div class="row mb-3">
                <legend class="col-sm-2 col-form-label">Giới tính</legend>
                <div class="col-sm-10">
                    @foreach (['Nam', 'Nữ'] as $gender)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="{{ $gender }}"
                                {{ old('gender', $user->gender) === $gender ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $gender }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Ngày sinh -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="text" name="dateofbirth" class="form-control datepicker" style="width:200px"
                        value="{{ old('dateofbirth', \Carbon\Carbon::parse($user->dateofbirth)->format('d/m/Y')) }}"
                        placeholder="Chọn ngày sinh">
                </div>
            </div>

            <!-- Nút lưu -->
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                endDate: '0d',
                todayHighlight: true
            });
        });
    </script>
@endsection
