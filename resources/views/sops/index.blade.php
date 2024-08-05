@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('sops.create') }}" class="btn btn-primary float-right">
                                <i class="fas fa-plus me-2"></i> Create SOP
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sops as $sop)
                                        <tr>
                                            <td>{{ $sop->title }}</td>
                                            <td>{{ $sop->department->name }}</td>
                                            <td class="text-center" style="width: 140px;">
                                                <!-- View Description Icon -->
                                                <a href="javascript:void(0);" onclick="viewDescription('{{ $sop->title }}', '{{ $sop->description }}')" class="btn btn-sm p-0" title="View Description">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>

                                                <!-- Edit Icon -->
                                                <a href="{{ route('sops.edit', $sop->id) }}" class="btn btn-sm p-0 mx-1" title="Edit">
                                                    <i class="fas fa-edit text-success"></i>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('sops.destroy', $sop->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this SOP?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm p-0" style="border: none; background: none;" title="Delete">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                    </button>
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

        <!-- Description Modal -->
        <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="descriptionModalLabel">SOP Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="descriptionContent">
                        <!-- SOP title and content will be loaded here -->
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
            // Set the title and content in the modal
            document.getElementById('descriptionContent').innerHTML = '<h5>' + title + '</h5><p>' + content + '</p>';
            // Show the modal
            var descriptionModal = new bootstrap.Modal(document.getElementById('descriptionModal'));
            descriptionModal.show();
        }
    </script>
@endsection
