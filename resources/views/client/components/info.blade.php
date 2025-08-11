@extends('client.user')

@section(section: 'title', content: 'Thông tin cá nhân')
@section('content')
    <div class="col-md-9">
        <div class="profile-section mt-4">
            <h4>Hồ Sơ Của Tôi</h4>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Tên</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Nhập tên" name="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="tel" name="phone" class="form-control" placeholder="Nhập số điện thoại"
                            pattern="[0-9]{10}" maxlength="10" inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="phone"
                            value="{{ old('phone', $user->phone) }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Nam"
                                {{ old('gender', $user->gender) === 'Nam' ? 'checked' : '' }}>
                            <label class="form-check-label">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="Nữ"
                                {{ old('gender', $user->gender) === 'Nữ' ? 'checked' : '' }}>
                            <label class="form-check-label">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dateofbirth" class="col-sm-2 col-form-label">Ngày sinh</label>
                    <div class="col-sm-10"> <input type="text" class="form-control datepicker" name="dateofbirth"
                            style="width:200px"
                            value="{{ old('dateofbirth', \Carbon\Carbon::parse($user->dateofbirth)->format('d/m/Y')) }}"
                            placeholder="Chọn ngày sinh"></div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-danger">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
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
