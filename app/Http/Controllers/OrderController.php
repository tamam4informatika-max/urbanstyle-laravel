<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'items' => 'required|array'
            ]);

            $subtotal = 0;

            foreach ($request->items as $item) {
                $subtotal += $item['price'] * $item['qty'];
            }

            $order = Order::create([
                'order_id' => 'ORD-' . time(),
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'customer_address' => $request->address,
                'total' => $subtotal + 20000
            ]);

            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['qty']
                ]);
            }

            return response()->json([
                'success' => true
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}