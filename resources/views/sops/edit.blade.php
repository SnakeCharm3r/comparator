@extends('layouts.template')

@section('content')
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
                            <form action="{{ route('sops.update', $sop->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $sop->title }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="department">Department</label>
                                    <select class="form-control" name="deptId" required>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                {{ $department->id == $sop->deptId ? 'selected' : '' }}>
                                                {{ $department->dept_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="pdf_path">PDF</label>
                                    <input type="file" class="form-control" id="pdf_path" name="pdf_path">
                                    @if ($sop->pdf_path)
                                        <a href="{{ asset('storage/' . $sop->pdf_path) }}" target="_blank"
                                            class="btn btn-link mt-2">View Current PDF</a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update SOP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
