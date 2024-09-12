@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Edit Job Title</h1>
        <form action="{{ route('job-titles.update', $jobTitle) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $jobTitle->title }}" required>
            </div>
            <div class="form-group">
                <label for="department_id">Department</label>
                <select class="form-control" id="department_id" name="department_id" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $jobTitle->department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
