@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header mb-4"
                                style="padding: 15px; background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                <h3 class="page-title mb-0"> Employee Exit Form</h3>
                            </div>

                            <div class="form-container p-4 border rounded shadow-sm">
                                <form action="{{ route('clearance.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                    <!-- Section I: Staff Details -->
                                    <h4 class="section-title mb-4"
                                        style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section I:
                                        Staff Details</h4>
                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name"><strong>First Name:</strong></label>
                                                <input type="text" class="form-control" id="first_name"
                                                    value="{{ Auth::user()->fname }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name"><strong>Last Name:</strong></label>
                                                <input type="text" class="form-control" id="last_name"
                                                    value="{{ Auth::user()->lname }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="job_title"><strong>Job Title:</strong></label>
                                                <input type="text" class="form-control" id="job_title"
                                                    value="{{ Auth::user()->job_title }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="department"><strong>Department:</strong></label>
                                                <input type="text" class="form-control" id="department"
                                                    value="{{ Auth::user()->department->dept_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date"><strong>Date:</strong></label>
                                                <input type="date" class="form-control" id="date" name="date"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Section II: Items to be collected -->
                                    <h4 class="section-title mb-4"
                                        style="background-color: #d4edda; padding: 10px; border-radius: 3px;">Section II:
                                        Items to be collected by last day of work</h4>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Description</th>
                                                <th class="text-center">Yes</th>
                                                <th class="text-center">No</th>
                                                <th class="text-center">N/A</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (['CCBRT Identification Card', 'CCBRT Name Tag', 'NHIF Cards (Including dependents’ card)', 'Does Staff have bonding agreement and do they need to pay back CCBRT?', 'Work permit cancelled (for non-Tanzanian)', 'Residence permit cancelled (for non-Tanzanian)'] as $item)
                                                <tr>
                                                    <td>{{ $item }}</td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="yes" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="no" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="na" class="form-check-input"></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Section III: Finance to confirm -->
                                    <h4 class="section-title mb-4"
                                        style="background-color: #d1ecf1; padding: 10px; border-radius: 3px;">Section III:
                                        Finance to confirm</h4>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Item Description</th>
                                                    <th class="text-center">Yes</th>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">N/A</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (['Repaid advance on Salary?', 'Staff informed Finance of outstanding loan balances?', 'Repaid any outstanding imprest?'] as $index => $item)
                                                    <tr>
                                                        <td>{{ $item }}</td>
                                                        <td class="text-center">
                                                            <input type="radio" name="item_{{ $index }}" value="yes" class="form-check-input">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="radio" name="item_{{ $index }}" value="no" class="form-check-input">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="radio" name="item_{{ $index }}" value="na" class="form-check-input">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        

                                    <!-- Section IV: Items Issued -->
                                    <h4 class="section-title mb-4"
                                        style="background-color: #fef9e7; padding: 10px; border-radius: 3px;">Section IV:
                                        Items Issued</h4>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Description</th>
                                                <th class="text-center">Yes</th>
                                                <th class="text-center">No</th>
                                                <th class="text-center">N/A</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (['Changing Room Keys?', 'Office Keys?', 'Mobile Phone?', 'Camera?', 'Uniforms?', 'Car Keys?', 'Other Items (please specify)'] as $item)
                                                <tr>
                                                    <td>{{ $item }}</td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="yes" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="no" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="na" class="form-check-input"></td>
                                                    <td>
                                                        @if ($item === 'Other Items (please specify)')
                                                            <textarea name="other_items" class="form-control" rows="3" placeholder="List other items here..."></textarea>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Section V: IT to Confirm -->
                                    <h4 class="section-title mb-4"
                                        style="background-color: #d1ecf1; padding: 10px; border-radius: 3px;">Section V: IT
                                        to Confirm</h4>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Description</th>
                                                <th class="text-center">Yes</th>
                                                <th class="text-center">No</th>
                                                <th class="text-center">N/A</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (['Laptop Returned?', 'Access Card Returned?', 'Domain Account Disabled?', 'Email Account Disabled?', 'Telephone PIN Disabled?', 'OpenClinic Account Disabled?', 'SAP Account Disabled?', 'Aruti Account Disabled?'] as $item)
                                                <tr>
                                                    <td>{{ $item }}</td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="yes" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="no" class="form-check-input"></td>
                                                    <td class="text-center"><input type="radio"
                                                            name="{{ strtolower(str_replace(' ', '_', $item)) }}"
                                                            value="na" class="form-check-input"></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Submit Button -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit Clearance
                                            Form</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .form-check-input {
            width: 20px;
            height: 20px;
            margin: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>
@endsection
