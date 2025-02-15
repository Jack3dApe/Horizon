@extends('layouts.admin.base')

@section('title', 'Deleted Support Tickets')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-between">
                <h1>Deleted Support Tickets</h1>
                <a href="{{ route('support_tickets.index') }}" class="btn btn-primary">Back to Support Tickets</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3"
                                   aria-label="Number of entries">
                        </div>
                        Records
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search support tickets">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Select all"></th>
                        <th class="w-1">ID</th>
                        <th>Title</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supportTickets as $ticket)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Select ticket"></td>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->customer->name ?? 'N/A' }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->deleted_at->format('m/d/Y') }}</td>
                            <td class="text-end">
                                {{-- Restore Button --}}
                                <form action="{{ route('support_tickets.restore', $ticket->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>

                                {{-- Force Delete Button --}}
                                <form action="{{ route('support_tickets.forceDelete', $ticket->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this support ticket?')">Force Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $supportTickets->links('layouts.admin.parts.paginationSupportTicket', ['supportTickets' => $supportTickets]) }}
            </div>
        </div>
    </div>
@endsection
