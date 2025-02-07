<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class OrderObserver
{
    /**
     * Disparado quando um pedido é marcado como "paid".
     */
    public function updated(Order $order)
    {
        if ($order->isDirty('status') && $order->status === 'paid') {
            $this->updateSalesData();
        }
    }

    /**
     * Atualiza as estatísticas de vendas e receitas.
     */
    protected function updateSalesData()
    {
        $yearStart = Carbon::now()->startOfYear();
        $monthStart = Carbon::now()->startOfMonth();

        // Total de vendas e receita desde o início do ano
        $yearlySales = Order::where('status', 'paid')
            ->where('created_at', '>=', $yearStart)
            ->count();

        $yearlyRevenue = Order::where('status', 'paid')
            ->where('created_at', '>=', $yearStart)
            ->sum('total_price');

        // Total de vendas e receita desde o início do mês
        $monthlySales = Order::where('status', 'paid')
            ->where('created_at', '>=', $monthStart)
            ->count();

        $monthlyRevenue = Order::where('status', 'paid')
            ->where('created_at', '>=', $monthStart)
            ->sum('total_price');

        // Cache para melhorar performance (opcional)
        Cache::put('yearly_sales', $yearlySales, 3600);
        Cache::put('yearly_revenue', $yearlyRevenue, 3600);
        Cache::put('monthly_sales', $monthlySales, 3600);
        Cache::put('monthly_revenue', $monthlyRevenue, 3600);
    }
}
