@extends('layouts.template')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Policies</h5>
                            <a href="{{ route('policies.create') }}" class="btn btn-primary float-right">Create Policy</a>
                        </div>
                        <div class="card-body">
                            @foreach ($policies as $policy)
                                <div class="mb-4">
                                    <h2>{{ $policy->title }}</h2>
                                    <div>{!! $policy->content !!}</div>
                                    <a href="{{ route('policies.show', $policy->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('policies.edit', $policy->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('policies.destroy', $policy->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
