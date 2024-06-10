@extends('layouts.template')
@section('breadcrumb')
<div class="container">
    <h1>Dashboard</h1>

    @if(isset($data['requester_content']))
        <div class="card">
            <div class="card-header">Requester Section</div>
            <div class="card-body">
                {{ $data['requester_content'] }}
            </div>
        </div>
    @endif

    @if(isset($data['admin_content']))
        <div class="card">
            <div class="card-header">Super Admin Section</div>
            <div class="card-body">
                {{ $data['admin_content'] }}
            </div>
        </div>
    @endif
</div>

    @if(isset($data['hr_content']))
        <div class="card">
            <div class="card-header">HR Section</div>
            <div class="card-body">
                {{ $data['hr_content'] }}
            </div>
        </div>
    @endif

    @if(isset($data['it_content']))
        <div class="card">
            <div class="card-header">IT Section</div>
            <div class="card-body">
                {{ $data['it_content'] }}
            </div>
        </div>
    @endif

    @if(isset($data['hod_content']))
        <div class="card">
            <div class="card-header">Head of Department Section</div>
            <div class="card-body">
                {{ $data['hod_content'] }}
            </div>
        </div>
    @endif

    @if(isset($data['acting_hod_content']))
        <div class="card">
            <div class="card-header">Acting Head of Department Section</div>
            <div class="card-body">
                {{ $data['acting_hod_content'] }}
            </div>
        </div>
    @endif
</div>

@endsection

@section('content')

@endsection

