<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardOverviewController extends Controller
{
    public function overview()
    {
        $totalUsers = User::count();
        $totalGames = Game::count();

        return view('adminoverview.show', compact('totalUsers', 'totalGames'));
    }
}
