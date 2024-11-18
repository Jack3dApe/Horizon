<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function store(Request $request)
    {
        $ticket = SupportTicket::create($request->all());
        return response()->json($ticket);
    }

}
