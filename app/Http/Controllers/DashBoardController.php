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
        return view('admin.components.chart', [
        'totalProducts' => Book::count(),
        'totalOrders' => Orders::count(), 
        'totalRevenue' => Orders::sum('total_price'),
        'todayRevenue' => Orders::whereDate('created_at', today())->sum('total_price'),
        'totalOrdersToday' => Orders::whereDate('created_at', today())->count(),
        'totalCustomers' => User::count(),
        'recentOrders' => Orders::latest()->take(5)->get(),
        'months' => ['1','2','3','4','5'], // tháng
        'revenues' => [500000, 700000, 300000, 900000, 1200000] // dữ liệu doanh thu
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
