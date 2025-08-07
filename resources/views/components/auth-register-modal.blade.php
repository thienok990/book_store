<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng ký</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="signUpname" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="signUpname" name="signUpname"
                            value="{{ old('signUpname') }}" required>
                        <div class="text-danger small">Tên phải từ 3 - 50 ký tự</div>
                    </div>
                    <div class="mb-3">
                        <label for="signUpEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="signUpEmail" name="signUpEmail"
                            value="{{ old('signUpEmail') }}" required>
                        <div class="text-danger small">Email phải đúng định dạng</div>
                    </div>
                    <div class="mb-3">
                        <label for="signUpPassword" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="signUpPassword" name="signUpPassword"
                            value="{{ old('signUpPassword') }}" required>
                        <div class="text-danger small">Mật khẩu tối thiểu 6 ký tự, có chữ hoa, thường</div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                </form>
            </div>
            <div class="modal-footer">
                <p class="mb-0">Bạn đã có tài khoản?
                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng
                        nhập</a>
                </p>
            </div>
        </div>
    </div>
</div>
