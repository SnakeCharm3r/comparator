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

                            <div class="form-container"
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
                                                <td rowspan="3"
                                                    style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                                                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo"
                                                        style="max-width: 100px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 6px;">
                                                    HR Exit Clearance Form</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 6px;">
                                                    Relevant area: IT & all other departments</td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="first_name"><strong>First Name:</strong></label>
                                                    {{ Auth::user()->fname }}

                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="last_name"><strong>Last Name:</strong></label>
                                                    {{ Auth::user()->lname }}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="job_title"><strong>Job Title:</strong></label>
                                                    {{ Auth::user()->job_title }}
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="department"><strong>Department:</strong></label>
                                                    {{ Auth::user()->department->dept_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="date"><strong>Date:</strong></label>
                                                    <input type="date" name="date" class="form-control" required
                                                        style="width: 160px;">
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
                                                    <label for="id_card">CCBRT Identification Card</label>
                                                    <input type="checkbox" name="id_card" id="id_card">
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
                                                    <label for="work_permit">Work permit cancelled (for
                                                        non-Tanzanian)</label>
                                                    <input type="checkbox" name="work_permit" id="work_permit">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="residence_permit">Residence permit cancelled (for
                                                        non-Tanzanian)</label>
                                                    <input type="checkbox" name="residence_permit" id="residence_permit">
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
                                                    <label for="informed_finance">Staff informed Finance of outstanding loan
                                                        balances?</label>
                                                    <input type="checkbox" name="informed_finance" id="informed_finance">
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
                                                    <label for="other_items">Other Items (please specify)</label>
                                                    <textarea name="other_items" id="other_items" rows="3"
                                                        style="width: 100%;" placeholder="List other items here..."></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; background-color: #d1ecf1; padding: 6px; font-weight: bold;">
                                                    IT to Confirm
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="laptop_returned">Laptop Returned?</label>
                                                    <input type="checkbox" name="laptop_returned" id="laptop_returned">
                                                </td>
                                                <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="access_card_returned">Access Card Returned?</label>
                                                    <input type="checkbox" name="access_card_returned"
                                                        id="access_card_returned">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="domain_account_disabled">Domain Account Disabled?</label>
                                                    <input type="checkbox" name="domain_account_disabled"
                                                        id="domain_account_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="email_account_disabled">Email Account Disabled?</label>
                                                    <input type="checkbox" name="email_account_disabled"
                                                        id="email_account_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="telephone_pin_disabled">Telephone PIN Disabled?</label>
                                                    <input type="checkbox" name="telephone_pin_disabled"
                                                        id="telephone_pin_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="openclinic_account_disabled">OpenClinic Account Disabled?</label>
                                                    <input type="checkbox" name="openclinic_account_disabled"
                                                        id="openclinic_account_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="sap_account_disabled">SAP Account Disabled?</label>
                                                    <input type="checkbox" name="sap_account_disabled"
                                                        id="sap_account_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"
                                                    style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                    <label for="aruti_account_disabled">Aruti Account Disabled?</label>
                                                    <input type="checkbox" name="aruti_account_disabled"
                                                        id="aruti_account_disabled">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: center; padding: 10px;">
                                                    <button type="submit" class="btn btn-primary">Submit Clearance Form</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
