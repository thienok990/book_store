  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Login</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('user.login') }}" method="POST">
                      @csrf
                      <input type="hidden" name="_form" value="register">
                      <div class="mb-3">
                          <label for="loginEmail" class="form-label">Email</label>
                          <input type="email" class="form-control" id="loginEmail" name="loginEmail"
                              value="{{ old('loginEmail') }}" required>
                          @error('loginEmail')
                              <div class="text-danger small">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="loginPassword" class="form-label">Mật khẩu</label>
                          <input type="password" class="form-control" id="loginPassword" name="loginPassword"
                              value="{{ old('loginPassword') }}" required>
                          @error('loginPassword')
                              <div class="text-danger small">{{ $message }}</div>
                          @enderror
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                  </form>
              </div>
              <div class="modal-footer">
                  <p class="mb-0">Bạn chưa có tài khoản?
                      <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                          data-bs-target="#signupModal">Đăng ký</a>
                  </p>
              </div>
          </div>
      </div>
  </div>
