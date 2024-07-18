@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Policies</h5>
                            <a href="{{ route('policies.create') }}" class="btn btn-primary float-right">
                                <i class="fas fa-plus me-2"></i> Create Policy
                            </a>
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
                                                <!-- View PDF Icon -->
                                                <a href="javascript:void(0);"
                                                    onclick="viewPDF('{{ asset('storage/' . $policy->pdf_path) }}')"
                                                    class="btn btn-sm p-0" title="View PDF">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>

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

        <!-- PDF Modal -->
        <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe id="pdfIframe" src="" style="width: 100%; height: 80vh; border: none;"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewPDF(pdfPath) {
            var iframe = document.getElementById('pdfIframe');
            iframe.src = pdfPath;
            // Show the PDF modal
            $('#pdfModal').modal('show');
        }
    </script>

    <!-- Ensure correct Bootstrap and jQuery versions -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
