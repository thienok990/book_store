<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title-admin', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4><a href="{{ route('dashboard.index') }}" class="nav-link text-white">Dashboard</a></h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('index.index') }}" class="nav-link text-white">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ route('book.index') }}" class="nav-link text-white">Sản phẩm</a></li>
                <li class="nav-item"><a href="{{ route('author.index') }}" class="nav-link text-white">Tác giả</a></li>
                <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link text-white">Thể loại</a>
                </li>
                <li class="nav-item"><a href="{{ route('orders.indexAdmin') }}" class="nav-link text-white">Đơn hàng</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Khách hàng</a></li>
                <li class="nav-item"><a href="{{ route('user.logout') }}" class="nav-link text-white">Đăng xuất</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div class="container-fluid p-4">
            @yield('header') {{-- Tiêu đề và nút thêm --}}

            @yield('table') {{-- Bảng dữ liệu --}}

            @yield('content') {{-- Bất kỳ nội dung tùy chỉnh nào --}}
        </div>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @yield('js') {{-- Các script tùy chỉnh --}}
</body>

</html>
