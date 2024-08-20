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
                            <h3 class="page-title mb-0">Employee Exit Form</h3>
                        </div>

                        <div class="form-container p-4 border rounded shadow-sm">
                            <form action="{{ route('clearance.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->id }}">

                                <!-- Section I: Staff Details -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section I: Staff
                                    Details</h4>
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

                                <!-- Section II A: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II A:
                                    Collect the Following Items by Last Day of Work</h4>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>CCBRT Identification Card</strong></label>
                                            <div>
                                                <label class="mr-4">
                                                    <input type="radio" name="ccbrt_id_card" value="Yes"> Yes
                                                </label>
                                                <label>
                                                    <input type="radio" name="ccbrt_id_card" value="N/A"> N/A
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label><strong>CCBRT Name Tag</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="ccbrt_name_tag"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="ccbrt_name_tag" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>NHIF Cards (Including dependents’ cards)</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="nhif_cards"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="nhif_cards" value="N/A"> N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Work Permit Cancelled (for non-Tanzanian)</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="work_permit_cancelled"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="work_permit_cancelled" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Residence Permit Cancelled (for non-Tanzanian)</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio"
                                                        name="residence_permit_cancelled" value="Yes"> Yes</label>
                                                <label><input type="radio" name="residence_permit_cancelled"
                                                        value="N/A"> N/A</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section II B: Finance Confirmation -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II B:
                                    Finance to Confirm</h4>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Repaid advance on Salary?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="repaid_salary_advance"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="repaid_salary_advance" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Staff informed Finance of outstanding loan
                                                    balances?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="loan_balances_informed"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="loan_balances_informed"
                                                        value="N/A"> N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Repaid any outstanding imprest?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio"
                                                        name="repaid_outstanding_imprest" value="Yes"> Yes</label>
                                                <label><input type="radio" name="repaid_outstanding_imprest"
                                                        value="N/A"> N/A</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section II C: Items Collection -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section II C:
                                    Collect the Following Items by Last Day of Work</h4>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Changing Room Keys</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="changing_room_keys"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="changing_room_keys" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Office Keys</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="office_keys"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="office_keys" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Mobile Phone</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="mobile_phone"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="mobile_phone" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Camera</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="camera"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="camera" value="N/A"> N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>CCBRT Uniforms</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="ccbrt_uniforms"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="ccbrt_uniforms" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Office Car Keys</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="office_car_keys"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="office_car_keys" value="N/A">
                                                    N/A</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Any other CCBRT items given (Please specify)</strong></label>
                                            <div>
                                                <input type="text" class="form-control" name="other_items">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section III: ICT Checklist -->
                                <h4 class="section-title mb-4"
                                    style="background-color: #e9ecef; padding: 10px; border-radius: 3px;">Section III: ICT
                                    Checklist</h4>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><strong>Laptop/iPad & Accessories & Gate Pass Returned?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="laptop_returned"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="laptop_returned" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Access Card MW & Private Clinic Returned?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="access_card_returned"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="access_card_returned" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Domain Account Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio"
                                                        name="domain_account_disabled" value="Yes"> Yes</label>
                                                <label><input type="radio" name="domain_account_disabled"
                                                        value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email Account Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="email_account_disabled"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="email_account_disabled"
                                                        value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Telephone Pin Code Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="telephone_pin_disabled"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="telephone_pin_disabled"
                                                        value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>OpenClinic Account Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio"
                                                        name="openclinic_account_disabled" value="Yes"> Yes</label>
                                                <label><input type="radio" name="openclinic_account_disabled"
                                                        value="No"> No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>SAP Account Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="sap_account_disabled"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="sap_account_disabled" value="No">
                                                    No</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Aruti Account Disabled?</strong></label>
                                            <div>
                                                <label class="mr-4"><input type="radio" name="aruti_account_disabled"
                                                        value="Yes"> Yes</label>
                                                <label><input type="radio" name="aruti_account_disabled"
                                                        value="No"> No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                            <div>
                                                <label for="signature"><strong>Signature:</strong></label>
                                                <input type="text" class="form-control" id="signature"
                                                    name="signature" required>
                                            </div>
                                            <div>
                                                <label for="declaration_date"><strong>Date:</strong></label>
                                                <input type="date" class="form-control" id="declaration_date"
                                                    name="declaration_date" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
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
    </style>
@endsection
