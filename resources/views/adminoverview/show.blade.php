@extends('layouts.admin.base')
@section('title', 'Overview')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1>Database Notifications</h1>
                    </div>
                    <div class="card-body">
                        <x-activity-log />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
