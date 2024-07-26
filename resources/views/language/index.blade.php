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

            <!-- Include required CSS -->
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                                                    class="nav-link">Health Details</a></li>
                                            <li class="nav-item"><a href="{{ route('ccbrt_relation.index') }}"
                                                    class="nav-link">CCBRT Relation</a></li>
                                            <li class="nav-item"><a href="{{ route('language_knowledge.index') }}"
                                                    class="active nav-link">Language</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">

                                            <!-- Button to trigger add language modal -->
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary mb-3"
                                                        data-bs-toggle="modal" data-bs-target="#addLanguageModal">
                                                        Add Language
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Modal for adding language knowledge -->
                                            <div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog"
                                                aria-labelledby="addLanguageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('language_knowledge.add') }}">
                                                            @csrf
                                                            <input type="hidden" name="userId"
                                                                value="{{ Auth::id() }}">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addLanguageModalLabel">Add
                                                                    Language</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row language-item">
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Language</label>
                                                                            <input type="text" class="form-control"
                                                                                name="language"
                                                                                value="{{ old('language') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Speaking</label>
                                                                            <input type="text" class="form-control"
                                                                                name="speaking"
                                                                                value="{{ old('speaking') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Reading</label>
                                                                            <input type="text" class="form-control"
                                                                                name="reading"
                                                                                value="{{ old('reading') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Writing</label>
                                                                            <input type="text" class="form-control"
                                                                                name="writing"
                                                                                value="{{ old('writing') }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add
                                                                    Language</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal for editing language knowledge -->
                                            <div class="modal fade" id="editLanguageModal" tabindex="-1" role="dialog"
                                                aria-labelledby="editLanguageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form id="editLanguageForm" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" id="editLanguageId" name="id">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editLanguageModalLabel">Edit
                                                                    Language</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row language-item">
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Language</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editLanguage" name="language">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Speaking</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editSpeaking" name="speaking">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Reading</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editReading" name="reading">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-3">
                                                                        <div class="form-group">
                                                                            <label>Writing</label>
                                                                            <input type="text" class="form-control"
                                                                                id="editWriting" name="writing">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Language</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Table for displaying language knowledge -->
                                            <h3>Language Knowledge</h3>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Language</th>
                                                            <th>Speaking</th>
                                                            <th>Reading</th>
                                                            <th>Writing</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($languageKnowledge as $knowledge)
                                                            <tr>
                                                                <td>{{ $knowledge->language }}</td>
                                                                <td>{{ $knowledge->speaking }}</td>
                                                                <td>{{ $knowledge->reading }}</td>
                                                                <td>{{ $knowledge->writing }}</td>
                                                                <td>
                                                                    <!-- Edit and Delete Icons -->
                                                                    <a href="#" class="text-primary edit-btn"
                                                                        data-id="{{ $knowledge->id }}"
                                                                        data-language="{{ $knowledge->language }}"
                                                                        data-speaking="{{ $knowledge->speaking }}"
                                                                        data-reading="{{ $knowledge->reading }}"
                                                                        data-writing="{{ $knowledge->writing }}"
                                                                        title="Edit">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('language_knowledge.destroy', $knowledge->id) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn text-danger delete-btn"
                                                                            title="Delete"
                                                                            style="background: none; border: none; cursor: pointer;">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="text-center">No language
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
                            <!-- Add other content for profile page here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include required JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle delete button click
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior

                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form
                            form.submit();
                        }
                    });
                });
            });

            // Handle edit button click
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const language = this.getAttribute('data-language');
                    const speaking = this.getAttribute('data-speaking');
                    const reading = this.getAttribute('data-reading');
                    const writing = this.getAttribute('data-writing');

                    // Populate the modal fields
                    document.getElementById('editLanguageId').value = id;
                    document.getElementById('editLanguage').value = language;
                    document.getElementById('editSpeaking').value = speaking;
                    document.getElementById('editReading').value = reading;
                    document.getElementById('editWriting').value = writing;

                    // Set the form action URL
                    document.getElementById('editLanguageForm').action =
                    `/language_knowledge/${id}`;

                    // Show the modal
                    new bootstrap.Modal(document.getElementById('editLanguageModal')).show();
                });
            });
        });
    </script>
@endsection
