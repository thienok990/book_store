<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/index.css'])
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cristy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-2">
        <div class="container-fluid">
            <div class="col-3 ">
                <img src="{{ asset('storage/images/thiet-ke-logo-nha-sach-book-pink.png') }}" alt="logo"
                    style=" height: 75px;
    width: auto;
    object-fit: contain;">
            </div>
            <div class="col-6"> <a class="navbar-brand mx-auto fw-bold" href="{{ route('index.index') }}"
                    style="flex-grow: 1; text-align: center;">
                    <h1 class="mb-0">Cristy</h1>
                </a></div>
            <div class="d-flex align-items-center gap-3 col-3 justify-content-end">
                <a href="{{ route('cart.show') }}" class="position-relative text-decoration-none text-dark">
                    <i class="bi bi-cart" style="font-size: 1.4rem;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                        {{ $totalQuantity }}
                    </span>
                </a>
                @if (request()->segment(1) !== 'cart' && request()->segment(1) !== 'user')
                    <form method="GET" action="{{ route('index.index') }}">
                        <div class="input-group w-100">
                            <div class="form-outline" data-mdb-input-init>
                                <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm"
                                    name="search" value="{{ request('search') }}" />
                            </div>
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                @endif
                @guest
                    <div class="text-center">
                        <button class="btn me-2" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                                class="bi bi-person"></i></button>
                    </div>

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
                                        <div class="mb-3">
                                            <label for="loginEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="loginEmail" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="loginPassword" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="loginPassword" name="password"
                                                required>
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
                                            <label for="signupName" class="form-label">Họ và tên</label>
                                            <input type="text" class="form-control" id="signupName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="signupEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="signupEmail" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="signupPassword" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control" id="signupPassword"
                                                name="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <p class="mb-0">Bạn đã có tài khoản?
                                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">Đăng nhập</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest
                @auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.show') }}">Thông tin cá
                                    nhân</a></li>
                            <li><a class="dropdown-item" href="/cart">Giỏ hàng</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.logout') }}">Đăng xuất</a></li>
                            @if (auth()->user()->isAdmin())
                                <li><a class="btn dropdown-item" href="{{ route('book.index') }}">Tới trang quản
                                        trị</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-fill">
        @yield('body')
    </main>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <h6>Company</h6>
                    <a href="#">About</a><br />
                    <a href="#">Our Shops</a><br />
                    <a href="#">News</a><br />
                    <a href="#">Delivery</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Help</h6>
                    <a href="#">Contact us</a><br />
                    <a href="#">FAQ</a><br />
                    <a href="#">Help</a><br />
                    <a href="#">Terms</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Mạng xã hội</h6>
                    <a href="https://www.facebook.com/thien.caoluong" target="_blank">Facebook</a><br />
                    <a href="https://github.com/thienok990?tab=repositories" target="_blank">Github </a><br />
                    <a href="https://www.instagram.com/_clt.121221/" target="_blank">Instagram</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h6>Contact</h6>
                    <p>TP.Thủ Đức, TP.Hồ Chí Minh, Việt Nam</p>
                    <p>Phone: 0388145796</p>
                    <p>Email: thiencao.work@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
</body>

</html>
