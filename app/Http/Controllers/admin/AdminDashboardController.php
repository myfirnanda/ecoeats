<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $activeOrders = Order::where('status', 'SUCCESS')->get();
        $pendingOrders = Order::where('status', 'PENDING')->get();
        $canceledOrders = Order::where('status', 'CANCELED')->get();
        return view('adminDashboard.index', [
            "activeOrders" => $activeOrders,
            "pendingOrders" => $pendingOrders,
            "canceledOrders" => $canceledOrders,
        ]);
    }
}
