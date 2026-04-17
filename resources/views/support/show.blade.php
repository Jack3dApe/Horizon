@extends('layouts.admin.base')
@section('title','View Ticket')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-ticket"></i> Ticket Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-key"></i> ID:</label>
                            <p class="text-muted">#{{ $ticket['id'] }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-tag"></i> Subject:</label>
                            <p class="text-muted">{{ $ticket['subject'] }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-flag"></i> Status:</label>
                            <p>
                                @if($ticket['status'] == 2)
                                    <span class="badge bg-warning text-white">Open</span>
                                @elseif($ticket['status'] == 3)
                                    <span class="badge bg-primary text-white">Pending</span>
                                @elseif($ticket['status'] == 4)
                                    <span class="badge bg-success text-white">Resolved</span>
                                @elseif($ticket['status'] == 5)
                                    <span class="badge bg-danger text-white">Closed</span>
                                @elseif($ticket['status'] == 6 || $ticket['status'] == 7)
                                    <span class="badge bg-secondary text-white">In Progress</span>
                                @else
                                    <span class="badge bg-secondary text-white">Unknown</span>
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-alert-circle"></i> Priority:</label>
                            <p>
                                @if($ticket['priority'] == 1)
                                    <span class="badge bg-success text-white">Low</span>
                                @elseif($ticket['priority'] == 2)
                                    <span class="badge bg-primary text-white">Medium</span>
                                @elseif($ticket['priority'] == 3)
                                    <span class="badge text-white" style="background-color: #FFD700;">High</span>
                                @elseif($ticket['priority'] == 4)
                                    <span class="badge bg-danger text-white">Urgent</span>
                                @else
                                    <span class="badge bg-light text-dark">Unknown</span>
                                @endif
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-calendar"></i> Created At:</label>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($ticket['created_at'])->format('Y-m-d H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-refresh"></i> Last Updated:</label>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($ticket['updated_at'])->format('Y-m-d H:i') }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"><i class="ti ti-file-text"></i> Description:</label>
                            <p class="bg-light p-3 rounded">
                                {!! nl2br(strip_tags($ticket['description'], '<br>')) !!}
                            </p>
                        </div>

                        <!-- Botões -->
                        <div class="text-end mt-4">
                            <a href="{{ route('admin.supporttickets.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all tickets
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
