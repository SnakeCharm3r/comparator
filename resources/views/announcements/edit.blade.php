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
                            <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" required
                                            value="{{ old('title', $announcement->title) }}"
                                            placeholder="Enter the announcement title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content" class="form-control" rows="4" required
                                            placeholder="Enter the announcement content">{{ old('content', $announcement->content) }}</textarea>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Include Quill Editor CDN --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill Editor with the existing content
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'font': []
                        }, {
                            'size': []
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
                        ['link', 'image'],
                        ['clean']
                    ]
                },
                placeholder: 'Edit your announcement content here...',
            });

            // Set the initial content
            quill.root.innerHTML = document.querySelector('input[name=content]').value;

            // Handle form submission and copy HTML content to hidden input field
            document.querySelector('form').onsubmit = function() {
                var content = document.querySelector('input[name=content]');
                content.value = quill.root.innerHTML; // Get the HTML content from the editor
            };
        });
    </script>
@endsection
