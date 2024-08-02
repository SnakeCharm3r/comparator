@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.css" />

    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Employees</h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                    </tr>
                </thead>
                <tbody>
                  
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                    </tr>
                </tfoot>
            </table> --}}
            <div class="card card-body p-3">
                <div class="table-responsive">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                <th>Professional No</th>
                                <th>Phone Number</th>
                                <th>CCBRT Code</th>
                                <th>Appointed Date</th>
                                <th>Gender Type</th>
                                <th>Birth Date</th>
                                <th>Marital Status</th>
                                <th>Birth Ward</th>
                                <th>Birth State</th>
                                <th>Birth Country</th>
                                <th>Nationality</th>
                                <th>Languages</th>
                                <th>Present Address</th>
                                <th>Emer. Con. names</th>
                                <th>Emer. Con. Address</th>
                                <th>Emer. Con. State</th>
                                <th>Emer. Con. Mobile</th>
                                <th>Emer. Con. Email</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->fname }} {{ $user->lname }}</td>
                                    <td>{{ $user->department->dept_name }}</td>
                                    <td>{{ $user->job_title }}</td>
                                    <td>{{ $user->professional_reg_number }}</td>
                                    <td>{{ $user->ccbrt_Code }}</td>
                                    <td>{{ $user->appointed_date }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->DOB }}</td>
                                    <td>{{ $user->marital_status }}</td>
                                    <td>{{ $user->birth_ward }}</td>
                                    <td>{{ $user->birth_state }}</td>
                                    <td>{{ $user->birth_country }}</td>
                                    <td>{{ $user->nationality }}</td>
                                    <td>{{ $user->language }}</td>
                                    <td>{{ $user->present_address }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->Emer_c_address }}</td>
                                    <td>{{ $user->Emer_c_state }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->Emer_c_email }}</td>


                                    {{-- <td>{{ $user->start_date->format('Y-m-d') }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                <th>Professional No</th>
                                <th>Phone Number</th>
                                <th>CCBRT Code</th>
                                <th>Appointed Date</th>
                                <th>Gender Type</th>
                                <th>Birth Date</th>
                                <th>Marital Status</th>
                                <th>Birth Ward</th>
                                <th>Birth State</th>
                                <th>Birth Country</th>
                                <th>Nationality</th>
                                <th>Languages</th>
                                <th>Present Address</th>

                                <th>Emer. Con. names</th>
                                <th>Emer. Con. Address</th>
                                <th>Emer. Con. State</th>
                                <th>Emer. Con. Mobile</th>
                                <th>Emer. Con. Email</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>




        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
@endsection
