@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Department</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form to update department -->
            <form action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="dept_name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" id="dept_name" name="dept_name"
                           value="{{ old('dept_name', $department->dept_name) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description', $department->description) }}</textarea>
                </div>

                <div class="form-group text-end">
                    <a href="{{ route('department.index') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
@endsection
