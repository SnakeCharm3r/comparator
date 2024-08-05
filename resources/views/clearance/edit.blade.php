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



                <h1>Edit Clearance Form</h1>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clearance.update', $clearanceForm->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="user_id">Select User</label>
                    <select name="user_id" id="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $clearanceForm->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->fname }} {{ $user->lname }}
                            </option>
                        @endforeach
                    </select>

                    <label for="staff_signature">Staff Signature</label>
                    <input type="text" name="staff_signature" id="staff_signature"
                        value="{{ $clearanceForm->staff_signature }}" required>

                    <label for="staff_signature_date">Date</label>
                    <input type="date" name="staff_signature_date" id="staff_signature_date"
                        value="{{ $clearanceForm->staff_signature_date }}" required>

                    <!-- Add the rest of the fields as necessary -->

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
