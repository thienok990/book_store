@extends('admin.dashboard')

@section('table-header')
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Tổng tiền</th>
        <th>Tình trạng</th>
    </tr>
@endsection

@section('table-content')
    @foreach ($oders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ number_format($order->total_price, 0, ',', '.') }} đ</td>
            <td>
                <form action="{{ route('orders.updateStatus', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option value="pending" {{ old('status', $order->status) == 'pending' ? 'selected' : '' }}>Đang xử lý
                        </option>
                        <option value="shipping" {{ old('status', $order->status) == 'shipping' ? 'selected' : '' }}>Đang
                            giao
                            hàng
                        </option>
                        <option value="completed" {{ old('status', $order->status) == 'completed' ? 'selected' : '' }}>Đã
                            giao
                            hàng
                        </option>
                        <option value="canceled" {{ old('status', $order->status) == 'canceled' ? 'selected' : '' }}>Đã huỷ
                        </option>
                    </select>
                </form>
            </td>
        </tr>
    @endforeach
@endsection
