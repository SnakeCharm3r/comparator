@extends('nav.app')

@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="page-sub-header">
                    <h3 class="page-title">Next Of Kins Panel</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="students.html">Employee</a></li>
                        <li class="breadcrumb-item active">Register as employee</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card comman-shadow">
                <div class="card-body">
                <form method="POST" action="{{ route('nextOfKins.addNextOfKins') }}" enctype="multipart/form-data">
                  @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title employee-info">Employee Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter First Name">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Middle Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Middle Name">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Last Name <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Gender <span class="login-danger">*</span></label>
                                    <select class="form-control select">
                                        <option>Select Gender</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Marital Status <span class="login-danger">*</span></label>
                                    <select class="form-control select">
                                        <option>Select Marital Status</option>
                                        <option>Married</option>
                                        <option>Single</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms calendar-icon">
                                    <label>Date Of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                </div>
                            </div>
  

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Religion <span class="login-danger">*</span></label>
                                    <select class="form-control select">
                                        <option>Please Select Religion </option>
                                        <option>Islamic</option>
                                        <option>Christian</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>E-Mail <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Home address <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Home Address">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>District<span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your District">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Professional Registration Number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your Professional Reg number">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Placde of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your Date of birth">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>House Number <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Your House Number">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Street <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter Street ">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Domicile <span class="login-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Enter your area of domicile">
                                </div>
                            </div>
                         
                         
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>Phone </label>
                                    <input class="form-control" type="text" placeholder="Enter Phone Number">
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <div class="student-submit">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
