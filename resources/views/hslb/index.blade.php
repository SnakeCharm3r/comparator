@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">HESLB Declarations</h3>
                            <a href="{{ route('hslb.create') }}" class="btn btn-primary float-right">New Declaration</a>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loan Status</th>
                                        <th>Form IV Index No.</th>
                                        <th>Signature</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($declarations as $declaration)
                                        <tr>
                                            <td>{{ $declaration->id }}</td>
                                            <td>{{ $declaration->loan_status }}</td>
                                            <td>{{ $declaration->form_iv_index_no }}</td>
                                            <td>{{ $declaration->signature }}</td>
                                            <td>{{ $declaration->date }}</td>
                                            <td>
                                                <a href="{{ route('hslb.show', $declaration->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('hslb.edit', $declaration->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('hslb.destroy', $declaration->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this declaration?');">Delete</button>
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
