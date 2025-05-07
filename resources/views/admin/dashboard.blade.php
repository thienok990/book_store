<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('css')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4>Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('index.index') }}" class="nav-link text-white">Trang chủ</a></li>
                <li class="nav-item"><a href="{{ route('book.index') }}" class="nav-link text-white">Sản phẩm</a></li>
                <li class="nav-item"><a href="{{ route('author.index') }}" class="nav-link text-white">Tác giả</a></li>
                <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link text-white">Thể loại</a>
                </li>
                <li class="nav-item"><a href="{{ route('orders.indexAdmin') }}" class="nav-link text-white">Đơn hàng</a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Khách hàng</a></li>
            </ul>
        </div>
        <!-- Content -->
        @if (!View::hasSection('no-header'))
            <div class="container-fluid p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Danh sách
                        @if (request()->segment(2) == 'book')
                            Sản phẩm
                        @elseif (request()->segment(2) == 'category')
                            Thể loại
                        @elseif (request()->segment(2) == 'author')
                            Tác giả
                        @else
                            Đơn hàng
                        @endif
                    </h3>
                    @if (request()->segment(2) !== 'orders')
                        <a href="{{ request()->segment(2) ? route(request()->segment(2) . '.create') : '#' }}"
                            class="btn btn-primary">
                            @if (request()->segment(2) == 'book')
                                Thêm sản phẩm
                            @elseif (request()->segment(2) == 'category')
                                Thêm thể loại
                            @else
                                Thêm tác giả
                            @endif
                        </a>
                    @endif
                </div>
        @endif
        @if (!View::hasSection('no-content'))
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    @yield('table-header')
                </thead>
                <tbody>
                    @yield('table-content')
                </tbody>
            </table>
        @endif
        @yield('content')
    </div>
</body>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@yield('js')

</html>
