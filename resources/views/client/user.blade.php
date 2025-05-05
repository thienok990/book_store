@extends('index')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{asset('storage/images/avt.jpg')}}" class="rounded-circle me-2" style="width:30px;height:30px">
                    <div>
                        <strong>{{ Auth::user()->name }}</strong><br>
                        <a href="{{ route('user.show') }}">✎ Sửa Hồ Sơ</a>
                    </div>
                </div>
                <h6 class="text-muted">Tài Khoản Của Tôi</h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('user.show') }}"><i
                                class="bi bi-person"></i> Hồ Sơ</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('order.show') }}"><i
                                class="bi bi-clipboard2"></i>Đơn mua</a>
                    </li>
                </ul>
            </div>

            <!-- Profile Form -->
            @yield('content')
        </div>
    </div>
@endsection
