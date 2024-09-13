@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Job Titles</h3>
                            <a href="{{ route('job_titles.create') }}" class="btn btn-primary">Add Job Title</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobTitles as $jobTitle)
                                            <tr>
                                                <td>{{ $jobTitle->id }}</td>
                                                <td>{{ $jobTitle->job_title }}</td>
                                                <td>{{ $jobTitle->department->dept_name }}</td>
                                                <td>
                                                    <a href="{{ route('job_titles.edit', $jobTitle) }}"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('job_titles.destroy', $jobTitle) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
