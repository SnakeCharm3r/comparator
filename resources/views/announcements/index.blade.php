@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <!-- Create Announcement Button -->
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="h4 mb-0">Announcements</h1>
                            <a href="{{ route('announcements.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Announcement
                            </a>
                        </div>

                        <!-- Announcements List -->
                        @if ($announcements->isEmpty())
                            <div class="card-body text-center">
                                <p class="lead">No announcements available.</p>
                            </div>
                        @else
                            <div class="list-group">
                                @foreach ($announcements as $announcement)
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="mb-1">{{ $announcement->title }}</h5>
                                            <button class="btn btn-info btn-sm" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $announcement->id }}" aria-expanded="false"
                                                aria-controls="collapse{{ $announcement->id }}">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </div>

                                        <!-- Collapsible Section -->
                                        <div id="collapse{{ $announcement->id }}" class="collapse mt-3">
                                            <div class="card p-3">
                                                <p class="mb-2">{{ $announcement->content }}</p>
                                                <small class="text-muted">
                                                    By {{ $announcement->user->name ?? 'Unknown' }} on
                                                    {{ $announcement->created_at->format('M d, Y') }}
                                                </small>
                                                <div class="mt-3">
                                                    @if ($announcement->pdf_path)
                                                        <!-- Link to view or download PDF -->
                                                        <a href="{{ Storage::url($announcement->pdf_path) }}"
                                                            class="btn btn-success" target="_blank">
                                                            <i class="fas fa-file-pdf"></i> View PDF
                                                        </a>
                                                    @endif

                                                    <a href="{{ route('announcements.edit', $announcement->id) }}"
                                                        class="btn btn-warning ml-2">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    <!-- Delete Announcement Form -->
                                                    <form action="{{ route('announcements.destroy', $announcement->id) }}"
                                                        method="POST" class="d-inline ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this announcement?')">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
