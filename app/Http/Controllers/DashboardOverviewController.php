<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\Payment;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardOverviewController extends Controller
{
    public function overview()
    {
        $totalUsers = User::count();
        $totalGames = Game::count();

        // Dados mensais para o gráfico
        $months = collect(range(0, 5))->map(function ($monthAgo) {
            return Carbon::now()->subMonths($monthAgo)->format('Y-m');
        })->reverse()->values();

        //Usuários Criados Por Mês
        $monthlyUsersGraph = $months->map(function ($month) {
            return User::whereYear('created_at', substr($month, 0, 4))
                ->whereMonth('created_at', substr($month, 5, 2))
                ->count();
        });

        //Jogos Vendidos Por Mês
        $monthlySalesGraph = $months->map(function ($month) {
            return OrderItem::whereYear('created_at', substr($month, 0, 4))
                ->whereMonth('created_at', substr($month, 5, 2))
                ->count();
        });

        // Total de vendas mensais
        $monthlySales = Payment::where('status', 'paid')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->count();

        // Total de vendas anuais
        $yearlySales = Payment::where('status', 'paid')
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $monthlyEarnings = Payment::where('status', 'paid')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->sum('amount');

        $yearlyEarnings = Payment::where('status', 'paid')
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('amount');

        // Calcular o total de vendas
        $totalSalesRaw = OrderItem::count();
        $totalSales = $this->formatNumber($totalSalesRaw);

        // Obter os 19 jogos mais vendidos
        $topSales = OrderItem::selectRaw('id_game, COUNT(*) as sales_count')
            ->groupBy('id_game')
            ->orderByDesc('sales_count')
            ->take(19)
            ->get();

        // Adicionar os nomes dos jogos e a porcentagem de vendas
        $topSales = $topSales->map(function ($sale) use ($totalSalesRaw) {
            $sale->game_name = Game::find($sale->id_game)->name; // Obter o nome do jogo
            $sale->percentage = $totalSalesRaw > 0 ? ($sale->sales_count / $totalSalesRaw) * 100 : 0; // Percentagem de vendas
            return $sale;
        });

        return view('adminoverview.show', compact(
            'totalUsers', 'totalGames', 'monthlySales', 'yearlySales',
            'monthlyEarnings', 'yearlyEarnings', 'topSales', 'totalSales', 'monthlyUsersGraph', 'monthlySalesGraph', 'months'
        ));
    }

    private function formatNumber($number)
    {
        if ($number >= 1000000) {
            return number_format($number / 1000000, 2) . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 2) . 'K';
        }
        return $number;
    }
}
