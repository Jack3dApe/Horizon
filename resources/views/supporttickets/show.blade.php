@extends('layouts.admin.base')
@section('title','View Ticket')
@section('content')
    <div class="container-xl mt-5">
        <h2 class="mb-4 text-center"><i class="ti ti-ticket"></i> Ticket Details</h2>

        <div class="card shadow-lg">
            <div class="card-body">
                <p><strong>ID:</strong> #{{ $ticket['id'] }}</p>
                <p><strong>Subject:</strong> {{ $ticket['subject'] }}</p>
                <p><strong>Status:</strong>
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
                </p>
                <p><strong>Priority:</strong>
                    @if($ticket['priority'] == 1)
                        <span class="badge bg-success" style="color: white;">Low</span> <!-- Green -->
                    @elseif($ticket['priority'] == 2)
                        <span class="badge bg-primary" style="color: white;">Medium</span> <!-- Blue -->
                    @elseif($ticket['priority'] == 3)
                        <span class="badge" style="background-color: #FFD700; color: white;">High</span> <!-- Yellow -->
                    @elseif($ticket['priority'] == 4)
                        <span class="badge bg-danger" style="color: white;">Urgent</span> <!-- Red -->
                    @else
                        <span class="badge bg-light" style="color: black;">Unknown</span>
                    @endif
                </p>
                <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($ticket['created_at'])->format('d/m/Y H:i') }}</p>
                <p><strong>Last Updated:</strong> {{ \Carbon\Carbon::parse($ticket['updated_at'])->format('d/m/Y H:i') }}</p>

                <p><strong>Description:</strong></p>
                <p class="bg-light p-3 rounded">
                    {!! nl2br(strip_tags($ticket['description'], '<br>')) !!}
                </p>

                <div class="mt-4">
                    <a href="{{ route('admin.supporttickets.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
