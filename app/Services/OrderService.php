<?php

namespace App\Services;

use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function getCustomOrdersByCustomerId($customerId)
    {
        return DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'orders.customer_id',
                'orders.delivery_address',
                'orders.address_type',
                'orders.status',
                'orders.payment_method',
                'orders.created_at',
                'orders.updated_at',
                'customers.name as customer_name',
                'customers.phone as customer_phone',
                'customers.email as customer_email',
                DB::raw('sum(order_items.total_price) as total'),
            )
            ->where('orders.customer_id', $customerId)
            ->groupBy('orders.id')
            ->orderByDesc('orders.created_at')
            ->get();
    }

    public function getCustomOrderByOrderId($orderId)
    {
        return DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->select(
                'orders.id',
                'orders.customer_id',
                'orders.delivery_address',
                'orders.address_type',
                'orders.status',
                'orders.payment_method',
                'orders.created_at',
                'orders.updated_at',
                'customers.name as customer_name',
                'customers.phone as customer_phone',
                'customers.email as customer_email',
                DB::raw('sum(order_items.total_price) as total'),
            )
            ->where('orders.id', $orderId)
            ->groupBy('orders.id')
            ->orderByDesc('orders.created_at')
            ->first();
    }

    public function getCustomOrderItemsByOrderId($orderId)
    {
        return DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select(
                'products.name as product_name',
                'products.main_image_path as image_path',
                'order_items.product_id',
                'order_items.quantity',
                'order_items.total_price',
            )
            ->where(['order_items.order_id' => $orderId])
            ->get();
    }
}
