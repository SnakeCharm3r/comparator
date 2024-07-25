@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Edit Family Member Details</h2>
        <form action="{{ route('family-details.editData', $familyDetail->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="{{ $familyDetail->full_name }}" required>

            <label for="relationship">Relationship:</label>
            <input type="text" id="relationship" name="relationship" value="{{ $familyDetail->relationship }}" required>

            <label for="DOB">Date of Birth:</label>
            <input type="date" id="DOB" name="DOB" value="{{ $familyDetail->DOB }}" required>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $familyDetail->phone_number }}">

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" value="{{ $familyDetail->occupation }}">

            <button type="submit">Update</button>
        </form>
    </div>
@endsection
