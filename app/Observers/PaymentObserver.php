<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class PaymentObserver
{
    /**
     * Disparado quando um pagamento é criado.
     */
    public function created(Payment $payment)
    {
        // Apenas processa se o status for "paid"
        if ($payment->status === 'paid') {
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
        $yearlySales = Payment::where('status', 'paid')
            ->where('created_at', '>=', $yearStart)
            ->count();

        $yearlyRevenue = Payment::where('status', 'paid')
            ->where('created_at', '>=', $yearStart)
            ->sum('amount');

        // Total de vendas e receita desde o início do mês
        $monthlySales = Payment::where('status', 'paid')
            ->where('created_at', '>=', $monthStart)
            ->count();

        $monthlyRevenue = Payment::where('status', 'paid')
            ->where('created_at', '>=', $monthStart)
            ->sum('amount');

        // Cache para melhorar performance (opcional)
        Cache::put('yearly_sales', $yearlySales, 3600);
        Cache::put('yearly_revenue', $yearlyRevenue, 3600);
        Cache::put('monthly_sales', $monthlySales, 3600);
        Cache::put('monthly_revenue', $monthlyRevenue, 3600);
    }
}
