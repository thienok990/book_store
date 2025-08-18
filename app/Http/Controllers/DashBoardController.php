<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Doanh thu theo tháng trong năm hiện tại
        $revenuesByMonth = Orders::selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue', 'month')
            ->toArray();

        // Tạo mảng 12 tháng (1-12), nếu tháng nào không có doanh thu thì gán = 0
        $months = range(1, 12);
        $revenues = [];
        foreach ($months as $m) {
            $revenues[] = $revenuesByMonth[$m] ?? 0;
        }

        return view('admin.components.chart', [
            'totalProducts' => Book::count(),
            'totalOrders' => Orders::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'totalRevenue' => Orders::sum('total_price'),
            'todayRevenue' => Orders::whereDate('created_at', today())->sum('total_price'),
            'totalOrdersToday' => Orders::whereDate('created_at', today())->count(),
            'totalCustomers' => User::count(),
            'recentOrders' => Orders::latest()->take(5)->paginate(5),
            'months' => $months,
            'revenues' => $revenues,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
