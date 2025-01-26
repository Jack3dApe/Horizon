@extends('layouts.admin.base')
@section('title', 'All Notifications')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header-notif">
                        <h1>Activity Log</h1>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <x-all-activity />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
