<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin');
    }

    public function inquiries()
    {
        $inquiries = Inquiry::latest()->get();

        return view('admin.inquiries', compact('inquiries'));
    }

    public function orders()
    {
        $orders = \App\Models\Order::with('items')->latest()->get();

        return view('admin.orders', compact('orders'));
    }
}