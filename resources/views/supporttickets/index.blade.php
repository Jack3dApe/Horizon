@extends('layouts.admin.base')
@section('title','View All Tickets')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3"
                                   aria-label="Number of tickets to display">
                        </div>
                        Records
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search ticket">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all"></th>
                        <th class="w-1">ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select ticket"></td>
                            <td><span class="text-secondary">#{{ $ticket['id'] }}</span></td>
                            <td>{{ $ticket['subject'] }}</td>
                            <td>
                                @if($ticket['status'] == 2)
                                    <span class="badge bg-warning" style="color: white;">Open</span>
                                @elseif($ticket['status'] == 3)
                                    <span class="badge bg-primary" style="color: white;">Pending</span>
                                @elseif($ticket['status'] == 4)
                                    <span class="badge bg-success" style="color: white;">Resolved</span>
                                @elseif($ticket['status'] == 5)
                                    <span class="badge bg-danger" style="color: white;">Closed</span>
                                @elseif($ticket['status'] == 6 || $ticket['status'] == 7)
                                    <span class="badge bg-secondary" style="color: white;">In Progress</span>
                                @else
                                    <span class="badge bg-secondary" style="color: white;">Unknown</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($ticket['created_at'])->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.supporttickets.show', $ticket['id']) }}" class="btn btn-info">
                                    <i class="ti ti-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
