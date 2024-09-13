@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Standard Operating Procedures (SOPs)</h5>
                            <a href="{{ route('sops.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> Create SOP
                            </a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Department</th>
                                        <th class="text-center" style="width: 160px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sops as $sop)
                                        <tr>
                                            <td>{{ $sop->title }}</td>
                                            <td>{{ $sop->dept_name }}</td>
                                            <td class="text-center">
                                                <!-- View PDF Icon -->
                                                @if ($sop->pdf_path)
                                                    <a href="{{ asset('storage/' . $sop->pdf_path) }}" target="_blank"
                                                        class="btn btn-warning btn-sm mx-1" title="View PDF">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                @endif

                                                <!-- Edit Icon -->
                                                <a href="{{ route('sops.edit', $sop->id) }}"
                                                    class="btn btn-success btn-sm mx-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('sops.destroy', $sop->id) }}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this SOP?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                        title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
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
    </div>
@endsection
