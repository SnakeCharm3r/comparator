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
                            <h5 class="card-title mb-0">Policies</h5>
                        </div>
                        <br>
                        <div class="container">
                            <form action="{{ route('policies.store') }}" method="POST" onsubmit="return submitForm()">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="content">Description</label>
                                    <div id="editor-container" style="height: 250px;"></div>
                                    <input type="hidden" id="content" name="content">
                                </div>
                                <button type="submit" class="btn btn-primary">Save Policy</button>
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

            window.submitForm = function() {
                var content = document.querySelector('input[name=content]');
                content.value = quill.root.innerHTML;
                return true;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
