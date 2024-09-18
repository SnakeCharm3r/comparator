{{-- @extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            @role('hr|admin|super-admin')
                                <a href="{{ route('policies.create') }}" class="btn btn-primary float-right">
                                    <i class="fas fa-plus me-2"></i> Create Policy
                                </a>
                            @endrole
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($policies as $policy)
                                        <tr>
                                            <td>{{ $policy->title }}</td>
                                            <td class="text-center" style="width: 140px;">
                                                <a href="javascript:void(0);"
                                                    onclick="viewDescription('{{ $policy->title }}', '{{ $policy->content }}')"
                                                    class="btn btn-sm p-0" title="View Description">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>


                                                @role('hr|admin|super-admin')
                                                    <!-- Edit Icon -->
                                                    <a href="{{ route('policies.edit', $policy->id) }}"
                                                        class="btn btn-sm p-0 mx-1" title="Edit">
                                                        <i class="fas fa-edit text-success"></i>
                                                    </a>

                                                    <!-- Delete Icon -->
                                                    <form action="{{ route('policies.destroy', $policy->id) }}" method="POST"
                                                        style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm p-0"
                                                            style="border: none; background: none;" title="Delete">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </button>
                                                    </form>
                                                @endrole

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

        <!-- Description Modal -->
        <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="descriptionModalLabel">Policy Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="descriptionContent">
                        <!-- Policy title and content will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewDescription(title, content) {
            // Set the title and content in the modal, allowing the content to be rendered as HTML
            document.getElementById('descriptionContent').innerHTML = '<h5>' + title + '</h5>' + content;

            // Show the modal
            var descriptionModal = new bootstrap.Modal(document.getElementById('descriptionModal'));
            descriptionModal.show();
        }
    </script>
@endsection --}}
@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Policies</h4>
                            @role('hr|admin|super-admin')
                                <a href="{{ route('policies.create') }}" class="btn btn-primary float-right">
                                    <i class="fas fa-plus me-2"></i> Create Policy
                                </a>
                            @endrole
                        </div>
                        <div class="card-body">
                            @foreach ($policies as $policy)
                                <div class="policy-item mb-4">
                                    <h5>{{ $policy->title }}</h5>

                                    <div class="policy-content">
                                        {!! $policy->content !!}
                                    </div>

                                    @role('hr|admin|super-admin')
                                        <a href="{{ route('policies.edit', $policy->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('policies.destroy', $policy->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this policy?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    @endrole
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .policy-content ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .policy-content ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        .policy-content p {
            margin-bottom: 1rem;
        }
    </style>
@endsection
