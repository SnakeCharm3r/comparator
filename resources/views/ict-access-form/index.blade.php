@extends('layouts.template')
@section('breadcrumb')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">User Creation, Deletion and Modification Form</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="fname" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="mname" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Surname</label>
                                            <input type="text" class="form-control" name="lname" value="">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Contact Details</label>
                                            <input type="text" class="form-control" name="phone_contact">
                                        </div>
                                        <div class="form-group">
                                            <label>Extension No</label>
                                            <input type="text" class="form-control" name="extension_no">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No</label>
                                            <input type="text" class="form-control" name="mobile_no">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Employee ID</label>
                                            <input type="text" class="form-control" name="employee_id">
                                        </div>
                                        <div class="form-group">
                                            <label>MCT Reg. No</label>
                                            <input type="text" class="form-control" name="mct_reg_no">
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control" name="department">
                                        </div>
                                        <div class="form-group">
                                            <label>Starting Date</label>
                                            <input type="date" class="form-control" name="starting_date">
                                        </div>

                                        <div class="form-group">
                                            <label>End Date</label>
                                            <!-- Only display this input field if the user is temporary -->
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>IT Assets Requested (Hardware)</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="telephone"> Telephone
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="printer"> Printer
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="laptop"> Laptop Computer
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="desktop"> Desktop Computer
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="monitor"> Monitor
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="external_drive"> External Drive
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_group">
                                                <option>Select</option>
                                                <option value="A+">A+</option>
                                                <option value="O+">O+</option>
                                                <option value="B+">B+</option>
                                                <option value="AB+">AB+</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male">
                                                <label class="form-check-label" for="gender_male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
                                                <label class="form-check-label" for="gender_female">Female</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>User Category</label>
                                            <select class="form-control" name="user_category">
                                                <option value="New">New User</option>
                                                <option value="Modify">Modify User</option>
                                                <option value="Delete">Delete User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tick Appropriate:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="user_action" id="create_radio" value="Create">
                                                <label class="form-check-label" for="create_radio">Create</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="user_action" id="modify_radio" value="Modify">
                                                <label class="form-check-label" for="modify_radio">Modify</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="user_action" id="delete_radio" value="Delete">
                                                <label class="form-check-label" for="delete_radio">Delete</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Required:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="required_action" id="create_radio" value="Create">
                                                <label class="form-check-label" for="create_radio">Create</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="required_action" id="modify_radio" value="Modify">
                                                <label class="form-check-label" for="modify_radio">Modify</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="required_action" id="delete_radio" value="Delete">
                                                <label class="form-check-label" for="delete_radio">Delete</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                                                            <p>IT Assets Requested (Software/Logical Access)</p>
                                                            <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Grant</th>
                                                                <th>Revoke</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Domain Controller</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Normal User</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Administrator</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Super Administrator</label>
                                                                    </div>
                                                                    <!-- Remaining grant options -->
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Normal User</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Administrator</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Super Administrator</label>
                                                                    </div>
                                                                    <!-- Remaining revoke options -->
                                                                </td>
                                                            </tr>
                                                            <!-- Additional rows -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                                                            <tbody>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Normal User</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Administrator</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="grant_printer" id="grant_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="grant_printer_normal">Super Administrator</label>
                                                                    </div>
                                                                    <!-- Remaining grant options -->
                                                                </td>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Normal User</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Administrator</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="revoke_printer" id="revoke_printer_normal" value="Normal User">
                                                                        <label class="form-check-label" for="revoke_printer_normal">Super Administrator</label>
                                                                    </div>
                                                                    <!-- Remaining revoke options -->
                                                                </td>
                                                            </tr>
                                                            <!-- Additional rows -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <p>Open Clinic HMS</p>
                                                    <table class="table table-striped mb-0">
                                                        <thead>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="cash_sales" id="" value="cash_sales">
                                                                    <label class="form-check-label" for="cash_sales">Cash Sales</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="controller" id="" value="controller">
                                                                    <label class="form-check-label" for="controller">Controller</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="CPVVF" id="" value="CPVVF">
                                                                    <label class="form-check-label" for="CPVVF">CP VVF</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="credit_sales" id="" value="credit_sales">
                                                                    <label class="form-check-label" for="credit_sales">Credit Sales</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="data_quality" id="" value="data_quality">
                                                                    <label class="form-check-label" for="data_quality">Data Quality</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="DH_Manager" id="" value="DH_Manager">
                                                                    <label class="form-check-label" for="DH_Manager">DH Manager</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="diagnostic_technician" id="" value="diagnostic_technician">
                                                                    <label class="form-check-label" for="diagnostic_technician">Diagnostic Technician</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="ENT_Nurses" id="" value="ENT_Nurses">
                                                                    <label class="form-check-label" for="ENT_Nurses">ENT Nurses</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="general_billing" id="" value="general_billing">
                                                                    <label class="form-check-label" for="ENT_Nurses">General Billing</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="gbc" id="" value="gbc">
                                                                    <label class="form-check-label" for="gbc">General Billing Controller</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="gbc" id="" value="gbc">
                                                                    <label class="form-check-label" for="gbc">General Billing Controller</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="hosr" id="" value="hosr">
                                                                    <label class="form-check-label" for="hosr">Head of SSD & Registration</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="ir" id="" value="ir">
                                                                    <label class="form-check-label" for="ir">Imaging Radiology</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="icn" id="" value="icn">
                                                                    <label class="form-check-label" for="ir">In charge Nurses PC</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="iaw" id="" value="iaw">
                                                                    <label class="form-check-label" for="iaw">Inventory Admin WH</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="iwsa" id="iwsa" value="iwsa">
                                                                    <label class="form-check-label" for="iwsa">Inventory WH Stock Admin</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="Li-charge" id="Li-charge" value="Li-charge">
                                                                    <label class="form-check-label" for="Li-charge">Laboratory in-charge</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="laboratory[]" id="" value="laboratory">
                                                                    <label class="form-check-label" for="laboratory">Laboratory</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="low_vision[]" id="" value="low_vision">
                                                                    <label class="form-check-label" for="low_vision">Low Vision</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="mcd" id="" value="mcd">
                                                                    <label class="form-check-label" for="mcd">Main Cash Desk</label>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="mr" id="" value="mr">
                                                                    <label class="form-check-label" for="mr">Medical Record</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="mr&g" id="" value="mr&g">
                                                                    <label class="form-check-label" for="mr&g">Medical Record & General</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="billing" id="" value="billing">
                                                                    <label class="form-check-label" for="iaw">Billing</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="na" id="na" value="na">
                                                                    <label class="form-check-label" for="na">Nurses Anesthesia</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="ne" id="Li-charge" value="ne">
                                                                    <label class="form-check-label" for="ne">Nurses Eye</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="no" id="" value="no">
                                                                    <label class="form-check-label" for="no">Nurses Orth</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="np" id="" value="np">
                                                                    <label class="form-check-label" for="np">Nurses Private</label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="mcd" id="" value="mcd">
                                                                    <label class="form-check-label" for="mcd">Main Cash Desk</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Add more items here in the same format -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
@endsection

