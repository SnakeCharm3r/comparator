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
                                                    class="nav-link">CCBRT Reation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="active nav-link">Language</a> </li>

                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active" id="family">
                                                <form method="POST" action="{{ route('language_knowledge.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ Auth::id() }}">
                                                    <div class="row language-item">
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Language</label>
                                                                <input type="text" class="form-control" name="language"
                                                                    value="{{ old('language') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Speaking</label>
                                                                <input type="text" class="form-control" name="speaking"
                                                                    value="{{ old('speaking') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Reading</label>
                                                                <input type="text" class="form-control" name="reading"
                                                                    value="{{ old('reading') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="form-group">
                                                                <label>Writing</label>
                                                                <input type="text" class="form-control" name="writing"
                                                                    value="{{ old('writing') }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Add Language
                                                                Knowledge</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <hr>

                                                <h3>Language Knowledge</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Language</th>
                                                                <th>Speaking</th>
                                                                <th>Reading</th>
                                                                <th>Writing</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($languageKnowledge as $knowledge)
                                                                <tr>
                                                                    <td>{{ $knowledge->language }}</td>
                                                                    <td>{{ $knowledge->speaking }}</td>
                                                                    <td>{{ $knowledge->reading }}</td>
                                                                    <td>{{ $knowledge->writing }}</td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="4" class="text-center">No language
                                                                        knowledge found.</td>
                                                                </tr>
                                                            @endforelse
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
