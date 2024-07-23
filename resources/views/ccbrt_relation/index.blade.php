<!-- resources/views/profile/show.blade.php -->

@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">User Profile</h3>
                        </div>
                    </div>
                </div>
            </div>

            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="container">
                <div class="row flex-lg-nowrap">

                    <div class="col">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="card">
                                    <div class="card-body">

                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="{{ route('profile.index') }}"
                                                    class="nav-link">User Info</a></li>
                                            <li class="nav-item"><a href="{{ route('policies.user') }}"
                                                    class="nav-link">Policies</a></li>
                                            <li class="nav-item"><a href="#security" class="nav-link"
                                                    data-bs-toggle="tab">Password</a></li>
                                            <li class="nav-item"><a href="{{ route('family-details.index') }}"
                                                    class="nav-link">Family Details</a></li>
                                            <li class="nav-item"><a href="{{ route('health-details.index') }}"
                                                    class=" nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                    class="active nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="nav-link">Language</a> </li>


                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="family">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form method="POST"
                                                                    action="{{ route('ccbrt_relation.addRelationData') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="userId"
                                                                        value="{{ Auth::id() }}">
                                                                    <div class="row">
                                                                        <div class="col-12 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Names</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="names"
                                                                                    value="{{ old('names') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Relation</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="relation"
                                                                                    value="{{ old('relation') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Department</label>
                                                                                <select class="form-control"
                                                                                    name="department">
                                                                                    <option value="">Select
                                                                                        Department
                                                                                    </option>
                                                                                    @foreach ($departments as $department)
                                                                                        <option
                                                                                            value="{{ $department->id }}"
                                                                                            {{ old('department') == $department->id ? 'selected' : '' }}>
                                                                                            {{ $department->dept_name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-3">
                                                                            <div class="form-group">
                                                                                <label>Position</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="position"
                                                                                    value="{{ old('position') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col d-flex justify-content-end">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Add Relation
                                                                                Data</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <h3>Existing Relations</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Names</th>
                                                                <th>Relation</th>
                                                                <th>Department</th>
                                                                <th>Position</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($relations as $relation)
                                                                <tr>
                                                                    <td>{{ $relation->names }}</td>
                                                                    <td>{{ $relation->relation }}</td>
                                                                    <td>{{ $relation->department }}</td>
                                                                    <td>{{ $relation->position }}</td>
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
                            <!-- Add other content for profile page here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
