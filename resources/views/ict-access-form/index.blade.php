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

