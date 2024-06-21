@extends('layouts.template')
@include('sweetalert::alert')
@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit NHIF</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($nhif)
                                <form action="{{ route('nhif.update', $nhif->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $nhif->name) }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="active"
                                                {{ old('status', $nhif->status) == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ old('status', $nhif->status) == 'NotActive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>

                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('nhif.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            @else
                                <p>No NHIF record found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('content')
@endsection
