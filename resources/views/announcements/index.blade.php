{{-- @extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <!-- Page Header -->
                        <div class="card-header"
                             style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="h4 mb-0">Announcements</h1>
                                <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add Announcement
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($announcements->isEmpty())
                                <div class="alert alert-info text-center">
                                    No announcements available.
                                </div>
                            @else
                                @foreach ($announcements as $announcement)
                                    <div class="announcement mb-4 p-3 border rounded">
                                        <h3 class="h5 font-weight-bold">{{ $announcement->title }}</h3>
                                        <p class="mb-2">{{ $announcement->content }}</p>
                                        <small class="text-muted">
                                            By {{ $announcement->user->name ?? 'Unknown' }} on
                                            {{ $announcement->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Custom styles to enhance the look */
        .announcement {
            background-color: #ffffff;
            transition: box-shadow 0.3s ease-in-out;
        }

        .announcement:hover {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
@endsection --}}
@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h1 class="h4 mb-0">{{ $announcement->title }}</h1>
                        </div>
                        <div class="card-body">
                            <p>{{ $announcement->content }}</p>
                            <small class="text-muted">
                                By {{ $announcement->user->name ?? 'Unknown' }} on
                                {{ $announcement->created_at->format('M d, Y') }}
                            </small>
                            <div class="mt-3">
                                <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this announcement?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
