@extends('layouts.template')
@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">ICT Access Form</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Please fill out the following form.</p>

                            <form method="POST" action="{{ route('form.store') }}">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->id }}">

                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">Aruti HR MIS<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="aruti" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if (in_array($privilege->prv_name, ['User', 'Administrator', 'Super Administrator', 'HR Officer', 'HR Manager']))
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                                                          <div class="form-group">
                                            <label for="openclinic_hms">SAP ERP<span class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="sap" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if (
                                                        $privilege->prv_name === 'User' ||
                                                            $privilege->prv_name === 'Administrator' ||
                                                            $privilege->prv_name === 'Finance' ||
                                                            $privilege->prv_name === 'Payroll Accountant' ||
                                                            $privilege->prv_name === 'CFO' ||
                                                            $privilege->prv_name === 'HR' ||
                                                            $privilege->prv_name === 'HR Manager' ||
                                                            $privilege->prv_name === 'HR Biodata' ||
                                                            $privilege->prv_name === 'Director of HR COO')
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">PABX<span class="text-danger">*</span></label>
                                            <select class="form-control" id="pbax" name="pbax" required>
                                                <option value="" disabled selected>---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if ($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator')
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>


                                    </div>

                                    <!-- Column 2 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">Active Directory<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="privilegeId" name="active_drt" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if ($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator')
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="hardware">Hardware</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Laptop computer"> Laptop
                                                            computer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Desktop computer">
                                                            Desktop computer</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Telephone">
                                                            Telephone</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" class="hardware-checkbox"
                                                                name="hardware_request[]" value="Drive">
                                                            External Drive</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="network_folder">Network Folder</label>
                                                    <select class="form-control" name="network_folder" required>
                                                        <option value="" disabled selected>Select a network folder</option>
                                                        <option value="Academy">Academy</option>
                                                        <option value="HR">HR</option>
                                                        <option value="ICT & Business Application">ICT & Business Application</option>
                                                        <option value="Insurances Validated Master">Insurances Validated Master</option>
                                                        <option value="LAB">LAB</option>
                                                        <option value="Mendeley">Mendeley</option>
                                                        <option value="Procurement">Procurement</option>
                                                        <option value="Q&S">Q&S</option>
                                                        <option value="SOP">SOP</option>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Network Folder Access</label>
                                                    <div class="d-flex">
                                                        @foreach ($privileges as $privilege)
                                                            @if (in_array($privilege->prv_name, ['Read', 'Write', 'Full Access']))
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="folder_privilege"
                                                                        id="privilege_{{ $privilege->id }}"value="{{ $privilege->id }}"
                                                                        required>
                                                                    <label class="form-check-label"
                                                                        for="privilege_{{ $privilege->id }}">{{ $privilege->prv_name }}</label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="openclinic_hms">OpenClinic HMIS Access</label>
                                                    <select class="form-control" id="hmisId" name="hmisId" required>
                                                        <option value="" disabled selected> ---Select an option---</option>
                                                        @foreach ($hmis as $hmi)
                                                            <option value="{{ $hmi->id }}">{{ $hmi->names }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Column 3 -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="openclinic_hms">NHIF Qualification</label>
                                            <select class="form-control" id="nhifId" name="nhifId" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{ $qualification->id }}">{{ $qualification->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="openclinic_hms">Network Access VPN</label>
                                            <select class="form-control" id="VPN" name="VPN" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if ($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator')
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="openclinic_hms">CCBRT Email</label>
                                            <select class="form-control" id="privilegeId" name="privilegeId" required>
                                                <option value="" disabled selected> ---Select an option---</option>
                                                @foreach ($privileges as $privilege)
                                                    @if ($privilege->prv_name === 'User' || $privilege->prv_name === 'Administrator')
                                                        <option value="{{ $privilege->id }}">{{ $privilege->prv_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3"
                                    style="background-color: #00d084; border-color: #00d084;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
