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

        // Obter os 10 jogos mais vendidos
        $topSales = OrderItem::selectRaw('id_game, COUNT(*) as sales_count')
            ->groupBy('id_game')
            ->orderByDesc('sales_count')
            ->take(10)
            ->get();

        // Calcular o total de vendas
        $totalSales = $topSales->sum('sales_count');

        // Adicionar os nomes dos jogos e a porcentagem de vendas
        $topSales = $topSales->map(function ($sale) use ($totalSales) {
            $sale->game_name = Game::find($sale->id_game)->name; // Obter o nome do jogo
            $sale->percentage = $totalSales > 0 ? ($sale->sales_count / $totalSales) * 100 : 0; // Porcentagem de vendas
            return $sale;
        });

        return view('adminoverview.show', compact(
            'totalUsers', 'totalGames', 'monthlySales', 'yearlySales',
            'monthlyEarnings', 'yearlyEarnings', 'topSales'
        ));
    }
}
