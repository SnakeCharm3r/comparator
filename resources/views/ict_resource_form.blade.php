@extends('layouts.template')
@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="page-header" style="padding: 20px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header" style="display: flex; flex-direction: column; align-items: flex-start;">
                            <h3 class="page-title" style="font-size: 24px; font-weight: bold; margin-bottom: 5px;">
                                ICT Access Form
                            </h3>
                            <p class="approval-info" style="font-size: 16px; color: #6c757d;">
                                Previous Approval:
                                @php
                                    $forwardedBy = \App\Models\User::findOrFail($ictForm->forwarded_by);
                                @endphp
                                {{ $forwardedBy->fname }} {{ $forwardedBy->lname }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <div class="form-container"
                    style="margin: 20px auto; max-width: 800px; border: 1px solid #dee2e6; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <div class="form-header" style="text-align: center; margin-bottom: 20px;">
                        <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo"
                            style="max-width: 120px; margin-bottom: 10px;">
                        <p><strong>Comprehensive Community Based Rehabilitation in Tanzania</strong></p>
                        <h3 style="font-size: 1.5rem; font-weight: bold;">ICT Access Form</h3>
                    </div>
                    <table class="table-custom" style="width: 100%; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Username
                                </td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->username }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Mobile
                                    Number</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->mobile }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">User
                                    Category</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->userCategory }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Starting
                                    Date</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->starting_date }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">PABX</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->pabx }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Email
                                </td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    Department</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->department }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Active
                                    Directory</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->active_directory }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Ending
                                    Date</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->ending_date }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Employee
                                    ID</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->employee_id }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Hardware
                                </td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    <ul style="margin: 0; padding-left: 20px;">
                                        {{-- @foreach ($ictForm->hardware as $hardware)
                                            <li>{{ $hardware }}</li>
                                        @endforeach --}}
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">First
                                    Name</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->first_name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Last Name
                                </td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->last_name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    Employment Type</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->employment_type }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">NHIF
                                    Qualification</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->nhif_qualification }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">HMIS
                                    Access</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->hmis_access }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">CCBRT
                                    Email</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->ccbrt_email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">SAP ERP
                                </td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->sap_erp }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">Network
                                    Access VPN</td>
                                <td style="width: 50%; border: 1px solid #dee2e6; padding: 8px; text-align: left;">
                                    {{ $ictForm->network_access_vpn }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="footer" style="text-align: center; margin-top: 20px; font-size: 0.9rem; color: #6c757d;">
                        <p><strong>Organization Name</strong></p>
                        <p>Address: 123 Main Street, City, Country</p>
                        <p class="contact-info" style="margin-top: 10px;">Phone: (123) 456-7890 | Email:
                            contact@organization.com</p>
                    </div> --}}
                </div>
                <div class="buttons-container" style="text-align: right; margin-top: 20px;">
                    <button type="button" class="btn btn-primary" style="margin-left: 5px;"
                        onclick="approveForm({{ $ictForm->access_id }})">Approve</button>
                    <button type="button" class="btn btn-primary" style="margin-left: 5px;">Edit</button>
                    <button type="button" class="btn btn-primary" style="margin-left: 5px;"
                        onclick="generatePDF()">Download PDF</button>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <script>
        function generatePDF() {
            const element = document.querySelector('.form-container');
            html2pdf().from(element).save('Official_Document.pdf');
        }

        function approveForm(access_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to approve this form?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'POST',
                        url: '/approve_form',
                        data: {
                            access_id: access_id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Approved!',
                                text: 'Form has been approved.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/requestapprove';
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Failed to approve form.', 'error');
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'The form was not approved :)', 'error');
                }
            });
        }
    </script>
@endsection
