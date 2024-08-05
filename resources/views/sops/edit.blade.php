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
                            <h5 class="card-title mb-0">Edit SOP</h5>
                        </div>
                        <br>
                        <div class="container">
                            <form action="{{ route('sops.update', $sop->id) }}" method="POST"
                                onsubmit="return submitForm()">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $sop->title }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="department">Department</label>
                                    <select class="form-control" id="department" name="department_id" required>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $sop->department_id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <div id="editor-container" style="height: 250px;"></div>
                                    <input type="hidden" id="description" name="description">
                                </div>
                                <button type="submit" class="btn btn-primary">Update SOP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quill = new Quill('#editor-container', {
                theme: 'snow'
            });
            quill.root.innerHTML = @json($sop->description);

            window.submitForm = function() {
                var description = document.querySelector('input[name=description]');
                description.value = quill.root.innerHTML;
                return true;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
