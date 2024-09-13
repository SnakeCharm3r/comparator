@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h1 class="h4 mb-0">Edit Announcement</h1>
                        </div>

                        <div class="card-body">
                            <!-- Edit Announcement Form -->
                            <form action="{{ route('announcements.update', $announcement->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required
                                        value="{{ old('title', $announcement->title) }}"
                                        placeholder="Enter the announcement title">
                                </div>

                                {{-- <div class="form-group mb-3">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" class="form-control" rows="4" required
                                        placeholder="Enter the announcement content">{{ old('content', $announcement->content) }}</textarea>
                                </div> --}}

                                <div class="form-group mb-3">
                                    <label for="pdf">Upload PDF (optional)</label>
                                    <input type="file" name="pdf" id="pdf" class="form-control" accept=".pdf">

                                    @if ($announcement->pdf_path)
                                        <div class="mt-2">
                                            <a href="{{ Storage::url($announcement->pdf_path) }}" class="btn btn-success"
                                                target="_blank">
                                                <i class="fas fa-file-pdf"></i> View Current PDF
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
