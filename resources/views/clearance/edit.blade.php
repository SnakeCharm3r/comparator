@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="page-header mb-4"
                            style="padding: 15px; background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                            <h3 class="page-title mb-0">Edit Employee Exit Form</h3>
                        </div>

                        <div class="form-container p-4 border rounded shadow-sm">
                            <form action="{{ route('clearance.update', $clearance->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="userId" value="{{ $clearance->user_id }}">

                                <!-- Section I: Staff Details -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section I: Staff
                                    Details</h4>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name"><strong>First Name:</strong></label>
                                            <input type="text" class="form-control" id="first_name"
                                                value="{{ $clearance->user->fname }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name"><strong>Last Name:</strong></label>
                                            <input type="text" class="form-control" id="last_name"
                                                value="{{ $clearance->user->lname }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="job_title"><strong>Job Title:</strong></label>
                                            <input type="text" class="form-control" id="job_title"
                                                value="{{ $clearance->user->job_title }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="department"><strong>Department:</strong></label>
                                            <input type="text" class="form-control" id="department"
                                                value="{{ $clearance->user->department->dept_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date"><strong>Date:</strong></label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                value="{{ $clearance->date }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section II A: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II A:
                                    Collect the Following Items by Last Day of Work</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>CCBRT Identification Card</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="ccbrt_id_card" value="Yes"
                                                        {{ $clearance->ccbrt_id_card == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="ccbrt_id_card" value="N/A"
                                                        {{ $clearance->ccbrt_id_card == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>CCBRT Name Tag</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="ccbrt_name_tag" value="Yes"
                                                        {{ $clearance->ccbrt_name_tag == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="ccbrt_name_tag" value="N/A"
                                                        {{ $clearance->ccbrt_name_tag == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>NHIF Cards (Including dependents’ cards)</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="nhif_cards" value="Yes"
                                                        {{ $clearance->nhif_cards == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="nhif_cards" value="N/A"
                                                        {{ $clearance->nhif_cards == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Work Permit Cancelled (for non-Tanzanian)</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="work_permit_cancelled" value="Yes"
                                                        {{ $clearance->work_permit_cancelled == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="work_permit_cancelled" value="N/A"
                                                        {{ $clearance->work_permit_cancelled == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Residence Permit Cancelled (for non-Tanzanian)</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="residence_permit_cancelled" value="Yes"
                                                        {{ $clearance->residence_permit_cancelled == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="residence_permit_cancelled" value="N/A"
                                                        {{ $clearance->residence_permit_cancelled == 'N/A' ? 'checked' : '' }}>
                                                    N/A
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section II B: Finance Confirmation -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II B:
                                    Finance to Confirm</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>Repaid advance on Salary?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="repaid_salary_advance" value="Yes"
                                                        {{ $clearance->repaid_salary_advance == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="repaid_salary_advance" value="N/A"
                                                        {{ $clearance->repaid_salary_advance == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Staff informed Finance of outstanding loan balances?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="loan_balances_informed" value="Yes"
                                                        {{ $clearance->loan_balances_informed == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="loan_balances_informed" value="N/A"
                                                        {{ $clearance->loan_balances_informed == 'N/A' ? 'checked' : '' }}>
                                                    N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Repaid any outstanding imprest?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="repaid_outstanding_imprest" value="Yes"
                                                        {{ $clearance->repaid_outstanding_imprest == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="repaid_outstanding_imprest" value="N/A"
                                                        {{ $clearance->repaid_outstanding_imprest == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section II C: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II C:
                                    Collect the Following Items by Last Day of Work</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>Changing Room Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="changing_room_keys" value="Yes"
                                                        {{ $clearance->changing_room_keys == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="changing_room_keys" value="N/A"
                                                        {{ $clearance->changing_room_keys == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="office_keys" value="Yes"
                                                        {{ $clearance->office_keys == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="office_keys" value="N/A"
                                                        {{ $clearance->office_keys == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile Phone</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="mobile_phone" value="Yes"
                                                        {{ $clearance->mobile_phone == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="mobile_phone" value="N/A"
                                                        {{ $clearance->mobile_phone == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Camera</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="camera" value="Yes"
                                                        {{ $clearance->camera == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="camera" value="N/A"
                                                        {{ $clearance->camera == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>CCBRT Uniforms</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="ccbrt_uniforms" value="Yes"
                                                        {{ $clearance->ccbrt_uniforms == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="ccbrt_uniforms" value="N/A"
                                                        {{ $clearance->ccbrt_uniforms == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Office Car Keys</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="office_car_keys" value="Yes"
                                                        {{ $clearance->office_car_keys == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="office_car_keys" value="N/A"
                                                        {{ $clearance->office_car_keys == 'N/A' ? 'checked' : '' }}> N/A
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Any other CCBRT items given (Please specify)</strong></td>
                                            <td>
                                                <input type="text" class="form-control" name="other_items"
                                                    value="{{ $clearance->other_items }}">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section III: ICT Checklist -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section III: ICT
                                    Checklist</h4>
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td><strong>Laptop/iPad & Accessories & Gate Pass Returned?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="laptop_returned" value="Yes"
                                                        {{ $clearance->laptop_returned == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="laptop_returned" value="No"
                                                        {{ $clearance->laptop_returned == 'No' ? 'checked' : '' }}> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Access Card MW & Private Clinic Returned?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="access_card_returned" value="Yes"
                                                        {{ $clearance->access_card_returned == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="access_card_returned" value="No"
                                                        {{ $clearance->access_card_returned == 'No' ? 'checked' : '' }}> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Domain Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="domain_account_disabled" value="Yes"
                                                        {{ $clearance->domain_account_disabled == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="domain_account_disabled" value="No"
                                                        {{ $clearance->domain_account_disabled == 'No' ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="email_account_disabled" value="Yes"
                                                        {{ $clearance->email_account_disabled == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="email_account_disabled" value="No"
                                                        {{ $clearance->email_account_disabled == 'No' ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telephone Pin Code Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="telephone_pin_disabled" value="Yes"
                                                        {{ $clearance->telephone_pin_disabled == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="telephone_pin_disabled" value="No"
                                                        {{ $clearance->telephone_pin_disabled == 'No' ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>OpenClinic Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="openclinic_account_disabled" value="Yes"
                                                        {{ $clearance->openclinic_account_disabled == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="openclinic_account_disabled" value="No"
                                                        {{ $clearance->openclinic_account_disabled == 'No' ? 'checked' : '' }}> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>SAP Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="sap_account_disabled" value="Yes"
                                                        {{ $clearance->sap_account_disabled == 'Yes' ? 'checked' : '' }}> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="sap_account_disabled" value="No"
                                                        {{ $clearance->sap_account_disabled == 'No' ? 'checked' : '' }}> No
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Aruti Account Disabled?</strong></td>
                                            <td>
                                                <label class="mr-4">
                                                    <input type="radio" name="aruti_account_disabled" value="Yes"
                                                        {{ $clearance->aruti_account_disabled == 'Yes' ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="aruti_account_disabled" value="No"
                                                        {{ $clearance->aruti_account_disabled == 'No' ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Section IV: Declaration -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section IV:
                                    Declaration</h4>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Staff Declaration:</strong></label>
                                            <p>To the best of my knowledge, I have returned all items in my possession
                                                belonging to CCBRT. I understand that failure to return items issued, could
                                                affect sums of money due to me as my final salary.</p>

                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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

        .table td {
            vertical-align: middle;
        }
    </style>
@endsection
