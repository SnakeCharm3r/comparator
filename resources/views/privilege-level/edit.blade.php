@extends('layouts.template')

@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Privilege</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($priv)
                                <form action="{{ route('privilege.update', $priv->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="prv_name" name="prv_name"
                                            value="{{ old('prv_name', $priv->prv_name) }}" required>
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="prv_status" name="prv_status" required>
                                            <option value="active" {{ old('prv_status', $priv->prv_status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('prv_status', $priv->prv_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('privilege.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            @else
                                <p>No privilege record found.</p>
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
