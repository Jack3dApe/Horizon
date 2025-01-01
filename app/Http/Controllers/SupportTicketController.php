<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;

class SupportTicketController extends Controller
{
    public function store(Request $request)
    {
        $ticket = SupportTicket::create($request->all());
        return response()->json($ticket);
    }

    public function deleted()
    {
        $tickets = SupportTicket::onlyTrashed()->paginate(10);
        return view('softdeletes.support_tickets.deleted', compact('tickets'));
    }

    public function restore($id)
    {
        $ticket = SupportTicket::withTrashed()->findOrFail($id);
        $ticket->restore();
        return redirect()->route('support_tickets.deleted')->with('success', 'Support Ticket restored successfully.');
    }

    public function forceDelete($id)
    {
        $ticket = SupportTicket::withTrashed()->findOrFail($id);
        $ticket->forceDelete();
        return redirect()->route('support_tickets.deleted')->with('success', 'Support Ticket permanently deleted.');
    }

}
