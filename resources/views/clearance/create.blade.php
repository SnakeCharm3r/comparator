@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="page-header"
                                style="padding: 5px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3 class="page-title">HR Exit Clearance Form</h3>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-container"
                                style="margin: 10px auto; max-width: 95%; border: 0.5px solid #dee2e6; padding: 3px; border-radius: 3px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">
                                <form action="{{ route('clearance.store') }}" method="POST">
                                    @csrf
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #e9ecef; padding: 6px; font-weight: bold;">
                                                    Staff Details
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="staff_name"><strong>Staff Name:</strong></label>
                                                    <input type="text" name="staff_name" id="staff_name"
                                                        class="form-control" required>
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="job_title"><strong>Job Title:</strong></label>
                                                    <input type="text" name="job_title" id="job_title"
                                                        class="form-control" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="department"><strong>Department:</strong></label>
                                                    <input type="text" name="department" id="department"
                                                        class="form-control" required>
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="unit_section"><strong>Unit/Section:</strong></label>
                                                    <input type="text" name="unit_section" id="unit_section"
                                                        class="form-control" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="date"><strong>Date:</strong></label>
                                                    <input type="date" name="date" id="date" class="form-control"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                    Items to be collected by last day of work
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="identification_card">CCBRT Identification Card</label>
                                                    <input type="checkbox" name="identification_card"
                                                        id="identification_card">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="name_tag">CCBRT Name Tag</label>
                                                    <input type="checkbox" name="name_tag" id="name_tag">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="nhif_cards">NHIF Cards (Including dependents’ card)</label>
                                                    <input type="checkbox" name="nhif_cards" id="nhif_cards">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="bonding_agreement">Does Staff have bonding agreement and do
                                                        they need to pay back CCBRT?</label>
                                                    <input type="checkbox" name="bonding_agreement" id="bonding_agreement">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="work_permit_cancelled">Work permit cancelled (for
                                                        non-Tanzanian)</label>
                                                    <input type="checkbox" name="work_permit_cancelled"
                                                        id="work_permit_cancelled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="residence_permit_cancelled">Residence permit cancelled (for
                                                        non-Tanzanian)</label>
                                                    <input type="checkbox" name="residence_permit_cancelled"
                                                        id="residence_permit_cancelled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                    Finance to confirm
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="repaid_advance">Repaid advance on Salary?</label>
                                                    <input type="checkbox" name="repaid_advance" id="repaid_advance">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="outstanding_loan_informed">Staff informed Finance of
                                                        outstanding loan balances?</label>
                                                    <input type="checkbox" name="outstanding_loan_informed"
                                                        id="outstanding_loan_informed">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="repaid_imprest">Repaid any outstanding imprest?</label>
                                                    <input type="checkbox" name="repaid_imprest" id="repaid_imprest">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #d1ecf1; padding: 6px; font-weight: bold;">
                                                    Items Issued
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="changing_room_keys">Changing Room Keys?</label>
                                                    <input type="checkbox" name="changing_room_keys"
                                                        id="changing_room_keys">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="office_keys">Office Keys?</label>
                                                    <input type="checkbox" name="office_keys" id="office_keys">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="mobile_phone">Mobile Phone?</label>
                                                    <input type="checkbox" name="mobile_phone" id="mobile_phone">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="camera">Camera?</label>
                                                    <input type="checkbox" name="camera" id="camera">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="uniforms">Uniforms?</label>
                                                    <input type="checkbox" name="uniforms" id="uniforms">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="car_keys">Car Keys?</label>
                                                    <input type="checkbox" name="car_keys" id="car_keys">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="other_items">Any other items issued?</label>
                                                    <input type="text" name="other_items" id="other_items"
                                                        class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #d1ecf1; padding: 6px; font-weight: bold;">
                                                    ICT Checklist
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="laptop_ipad">Laptop/iPad & Accessories & gate pass
                                                        Returned?</label>
                                                    <input type="checkbox" name="laptop_ipad" id="laptop_ipad">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="access_card">Access Card MW & Private Clinic
                                                        Returned?</label>
                                                    <input type="checkbox" name="access_card" id="access_card">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="domain_account">Domain Account Disabled?</label>
                                                    <input type="checkbox" name="domain_account" id="domain_account">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="email_account">Email Account Disabled?</label>
                                                    <input type="checkbox" name="email_account" id="email_account">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="telephone_pin">Telephone Pin Code Disabled?</label>
                                                    <input type="checkbox" name="telephone_pin" id="telephone_pin">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="openclinic_account">OpenClinic Account Disabled?</label>
                                                    <input type="checkbox" name="openclinic_account"
                                                        id="openclinic_account">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="sap_account">SAP Account Disabled?</label>
                                                    <input type="checkbox" name="sap_account" id="sap_account">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="aruti_account">Aruti Account Disabled?</label>
                                                    <input type="checkbox" name="aruti_account" id="aruti_account">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #e9ecef; padding: 6px; font-weight: bold;">
                                                    Declaration
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="declaration">To the best of my knowledge, I have returned
                                                        all items in my possession belonging to CCBRT. I understand that
                                                        failure to return items issued, could affect sums of money due to me
                                                        as my final salary.</label>
                                                    <input type="checkbox" name="declaration" id="declaration">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; padding: 10px;">
                                                    <button type="submit" class="btn btn-primary">Submit Clearance
                                                        Form</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
