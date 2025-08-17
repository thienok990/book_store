<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/index.css'])
    @yield('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Cristy')</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- jQuery & Datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- JS của view con -->
    @yield('js')
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-2">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="col-3">
                <img src="{{ asset('storage/images/thiet-ke-logo-nha-sach-book-pink.png') }}" alt="logo"
                    loading="lazy" style="height: 75px; width: auto; object-fit: contain;">
            </div>



            <!-- Brand -->
            <div class="col-6">
                <a class="navbar-brand mx-auto fw-bold" href="{{ route('index.index') }}">
                    <h1 class="mb-0">Cristy</h1>
                </a>
            </div>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRight"
                aria-controls="navbarRight" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right section -->
            <div class="collapse navbar-collapse col-3 justify-content-end" id="navbarRight">
                <div class="d-flex align-items-center gap-3 w-100 justify-content-end flex-wrap">
                    <a href="{{ route('cart.show') }}" class="position-relative text-decoration-none text-dark">
                        <i class="bi bi-cart" style="font-size: 1.4rem;"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success total-quantity">
                            {{ $totalQuantity }}
                        </span>
                    </a>

                    @if (request()->segment(1) !== 'cart' && request()->segment(1) !== 'user')
                        <form method="GET" action="{{ route('index.index') }}" class="flex-grow-1">
                            <div class="input-group w-100">
                                <input type="search" id="form1" class="form-control" placeholder="Tìm kiếm"
                                    name="search" value="{{ request('search') }}" />
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    @endif

                    @guest
                        <button class="btn me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-person"></i>
                        </button>
                        @include('components.auth-login-modal')
                        @include('components.auth-register-modal')
                    @endguest

                    @auth
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-person"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('user.show') }}">Thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="{{route('cart.show')}}">Giỏ hàng</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                @if (auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('dashboard.index') }}">Tới trang quản
                                            trị</a></li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <main class="flex-fill">
        @yield('body')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 mb-4">
                    <h6>Company</h6>
                    <a href="#">About</a><br />
                    <a href="#">Our Shops</a><br />
                    <a href="#">News</a><br />
                    <a href="#">Delivery</a>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <h6>Help</h6>
                    <a href="#">Contact us</a><br />
                    <a href="#">FAQ</a><br />
                    <a href="#">Help</a><br />
                    <a href="#">Terms</a>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <h6>Mạng xã hội</h6>
                    <a href="https://www.facebook.com/thien.caoluong" target="_blank">Facebook</a><br />
                    <a href="https://github.com/thienok990?tab=repositories" target="_blank">Github </a><br />
                    <a href="https://www.instagram.com/_clt.121221/" target="_blank">Instagram</a>
                </div>
                <div class="col-6 col-md-3 mb-4">
                    <h6>Contact</h6>
                    <p>TP.Thủ Đức, TP.Hồ Chí Minh, Việt Nam</p>
                    <p>Phone: 0388145796</p>
                    <p>Email: thiencao.work@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap Bundle 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <!-- Hiển thị thông báo -->
    @if (session('success'))
        <script>
            alert(@json(session('success')));
        </script>
    @endif
    @if (session('error'))
        <script>
            alert(@json(session('error')));
        </script>
    @endif

    <!-- Tự động mở modal nếu có session -->
    @if (session('login'))
        <script>
            const modalId = @json(session('login'));
            const modalEl = document.getElementById(modalId);
            if (modalEl) new bootstrap.Modal(modalEl).show();
        </script>
    @endif
</body>

</html>
