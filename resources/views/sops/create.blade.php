@extends('layouts.template')

@section('content')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Create SOP</h5>
                        </div>
                        <br>
                        <div class="container">
                            <form action="{{ route('sops.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Department</label><br>
                                    <div>
                                        <input type="checkbox" id="select-all" />
                                        <label for="select-all">Select All</label>
                                    </div>
                                    <div class="row" id="departments">
                                        @php
                                            $columns = 3; // Number of columns you want
                                            $departmentsPerColumn = ceil(count($departments) / $columns);
                                        @endphp

                                        @for ($i = 0; $i < $columns; $i++)
                                            <div class="col-md-4">
                                                @foreach ($departments->slice($i * $departmentsPerColumn, $departmentsPerColumn) as $department)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input dept-checkbox"
                                                            id="dept-{{ $department->id }}" name="deptIds[]"
                                                            value="{{ $department->id }}">
                                                        <label class="form-check-label"
                                                            for="dept-{{ $department->id }}">{{ $department->dept_name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="pdf">Upload PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf"
                                        accept="application/pdf" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Save SOP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Quill editor
            var quill = new Quill('#editor-container', {
                theme: 'snow'
            });

            window.submitForm = function() {
                var description = document.querySelector('input[name=description]');
                description.value = quill.root.innerHTML;
                return true;
            }

            // Handle select all checkbox
            document.getElementById('select-all').addEventListener('change', function() {
                var checkboxes = document.querySelectorAll('.dept-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
