@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header"
                                style="padding: 15px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1>Create Announcement</h1>
                                    </div>
                                </div>
                            </div>

                            {{-- Announcement Creation Form --}}
                            <form action="{{ route('announcements.store') }}" method="POST" onsubmit="submitForm()">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required
                                        placeholder="Enter the title of the announcement">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="content">Content</label>
                                    <div id="editor-container" style="height: 250px;"></div>
                                    <input type="hidden" id="content" name="content">
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
        // Initialize Quill Editor
        var quill = new Quill('#editor-container', {
            theme: 'snow',  // "snow" is the default theme that includes a toolbar
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'size': [] }],  // Font and size options
                    ['bold', 'italic', 'underline', 'strike'],  // Bold, italic, underline, strikethrough
                    [{ 'color': [] }, { 'background': [] }],  // Font color and background color
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],  // Ordered and bullet lists
                    [{ 'align': [] }],  // Alignment options
                    ['link', 'image'],  // Insert link and image
                    ['clean']  // Remove formatting
                ]
            },
            placeholder: 'Write your announcement here...',
            theme: 'snow'
        });

        // Submit Form and Copy HTML Content to Hidden Input Field
        function submitForm() {
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;  // Get the HTML content from the editor
        }
    </script>
@endsection
