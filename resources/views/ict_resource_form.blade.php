@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Page Header -->
                            <div class="page-header"
                                style="padding: 5px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                                <div class="row">
                                    <div class="page-sub-header"
                                        style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <!-- Previous Approval Section -->
                                        <p style="font-size: 14px; color: #6c757d;">
                                            <strong>Previous Approval:</strong>
                                            @php
                                                $forwardedBy = \App\Models\User::find($ictForm->forwarded_by);
                                            @endphp
                                            {{ $forwardedBy ? $forwardedBy->fname . ' ' . $forwardedBy->lname : 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- ICT Access Form Details Table -->
                            <div class="form-container"
                                style="margin: 10px auto; max-width: 95%; border: 0.5px solid #dee2e6; padding: 3px; border-radius: 3px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <td colspan="2"
                                                style="border: 1px solid #000; text-align: left; background-color: #e9ecef; padding: 6px; font-weight: bold;">
                                                ICT Access Form
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
                                            <td style="border: 1px solid #000; text-align: center; padding: 6px;">Document
                                                No: 01</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: center; padding: 6px;">Version:
                                                6.1</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: center; padding: 6px;">Relevant
                                                area: IT & all other departments</td>
                                        </tr>

                                        <!-- Personal Details Section -->
                                        <tr>
                                            <td colspan="2"
                                                style="border: 1px solid #000; text-align: left; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                Personal Details
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>First Name:</strong> {{ $ictForm->fname }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Middle Name:</strong> {{ $ictForm->mname }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Last Name:</strong> {{ $ictForm->lname }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Employee ID:</strong> {{ $ictForm->emp_id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Department:</strong> {{ $ictForm->dept_name }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Mobile Number:</strong> {{ $ictForm->mobile }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Starting Date:</strong> {{ $ictForm->starting_date }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>End Date:</strong> {{ $ictForm->end_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>User Category:</strong> {{ $ictForm->prv_name }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Employment Type:</strong> {{ $ictForm->employment_type }}
                                            </td>
                                        </tr>
                                        <!-- IT Assets and Access Section -->
                                        <tr>
                                            <td colspan="2"
                                                style="border: 1px solid #000; text-align: left; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                IT Assets Requested "Hardware" and Software/Logical Access
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Hardware:</strong> {{ $ictForm->hardware_request }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Active Directory:</strong> {{ $ictForm->prv_name }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Email:</strong> {{ $ictForm->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>OpenClinic HMS:</strong> {{ $ictForm->names }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Aruti HR MIS:</strong> {{ $ictForm->aruti_hr_mis }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>SAP ERP:</strong> {{ $ictForm->prv_name }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Network Access (VPN):</strong> {{ $ictForm->prv_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Call Manager - PABX:</strong> {{ $ictForm->prv_name }}
                                            </td>
                                            <td style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>NHIF Qualifications:</strong> {{ $ictForm->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"
                                                style="border: 1px solid #000; text-align: left; padding: 6px;">
                                                <strong>Network Directory Access:</strong> {{ $ictForm->physical_access }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Disclaimer and Declaration Section -->
                                <table style="width: 100%; border-collapse: collapse; margin-top: 5px;">
                                    <thead>
                                        <tr>
                                            <td colspan="3"
                                                style="border: 1px solid #000; text-align: center; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                Disclaimer on personal assets
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3"
                                                style="border: 1px solid #000; text-align: left; background-color: #f8f9fa; padding: 6px; color: #ff0000;">
                                                Requester accepts full accountability for the personal assets and any impact
                                                they may cause to CCBRT Infrastructure and understands that CCBRT will not
                                                be
                                                held liable for anything that may happen to them.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="border: 1px solid #000; text-align: center; background-color: #d4edda; padding: 6px; font-weight: bold;">
                                                Requester Declaration
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"
                                                style="border: 1px solid #000; text-align: left; background-color: #f8f9fa; padding: 6px; color: #ff0000;">
                                                I hereby acknowledge the completion of this form and accept accountabilities
                                                of
                                                the above requested CCBRT resources. In the event the CCBRT asset(s) is lost
                                                under my care I shall provide CCBRT with the asset or reimburse equivalent
                                                cost
                                                of purchase unless decided otherwise by CCBRT management.
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="border: 1px solid #000; text-align: left; padding: 6px;">Details:
                                            </th>
                                            <th style="border: 1px solid #000; text-align: left; padding: 6px;">Signature:
                                            </th>
                                            <th style="border: 1px solid #000; text-align: left; padding: 6px;">Date:</th>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 8px;">
                                                <strong>Requester:</strong> {{ $ictForm->fname }} {{ $ictForm->lname }}
                                            </td>
                                            <td style="border: 1px solid #000; padding: 1px;">
                                                @if ($user->signature)
                                                    <img src="data:image/png;base64,{{ $user->signature }}"
                                                        alt="User Signature" style="max-width: 40%; height: 5%;">
                                                @else
                                                    No signature available
                                                @endif
                                            </td>

                                            <td style="border: 1px solid #000; padding: 8px;">
                                                @if ($ictForm->status == 1)
                                                {{ \Carbon\Carbon::parse($ictForm->updated_at)->format('d F Y') }}
                                            @endif
                                            </td>
                                        </tr>



                                        <tr>
                                            <td style="border: 1px solid #000; padding: 6px;">Line Manager Name: {{ $lineManager->username ?? 'Not Available' }}</td>
                                            <td style="border: 1px solid #000; padding: 1px;">
                                                @if ($lineManager->signature)
                                                    <img src="data:image/png;base64,{{ $lineManager->signature }}"
                                                        alt="Line Manager Signature" style="max-width: 40%; height: 5%;">
                                                @else
                                                    No signature available
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000; padding: 6px;">
                                                @if ($ictForm->status == 1)
                                                    {{ \Carbon\Carbon::parse($ictForm->updated_at)->format('d F Y') }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 6px;">IT Officer Name: {{ $itOfficer->fname ?? 'Not Available' }}</td>
                                            <td style="border: 1px solid #000; padding: 1px;">
                                                @if ($itOfficer->signature)
                                                    <img src="data:image/png;base64,{{ $itOfficer->signature }}"
                                                        alt="IT Officer Signature" style="max-width: 40%; height: 5%;">
                                                @else
                                                    No signature available
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000; padding: 6px;">
                                                @if ($ictForm->status == 1)
                                                    {{ \Carbon\Carbon::parse($ictForm->updated_at)->format('d F Y') }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 6px;">HR Officer Name: {{ $hrOfficer->fname ?? 'Not Available' }}</td>
                                            <td style="border: 1px solid #000; padding: 1px;">
                                                @if ($hrOfficer->signature)
                                                    <img src="data:image/png;base64,{{ $hrOfficer->signature }}"
                                                        alt="HR Officer Signature" style="max-width: 40%; height: 5%;">
                                                @else
                                                    No signature available
                                                @endif
                                            </td>
                                            <td style="border: 1px solid #000; padding: 6px;">
                                                @if ($ictForm->status == 1)
                                                    {{ \Carbon\Carbon::parse($ictForm->updated_at)->format('d F Y') }}
                                                @endif
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>


                            <!-- Action Buttons -->
                            <div class="buttons-container"
                                style="margin-top: 15px; display: flex; justify-content: flex-end; gap: 10px; padding-right: 3%;">
                                <button type="button" class="btn btn-success"
                                    onclick="approveForm('{{ $ictForm->access_id }}')">Approve</button>
                                <button type="button" class="btn btn-danger"
                                    onclick="rejectForm('{{$ictForm->access_id}}')">Reject</button>
                                <button type="button" class="btn btn-primary" onclick="generatePDF()">Download</button>
                            </div>

                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
                    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
                    <script>
                        function generatePDF() {
                            const element = document.querySelector('.form-container');

                            // Ensure the element is at the top of the page
                            window.scrollTo(0, 0);

                            // Options for html2pdf
                            const options = {
                                margin: [2, 1, 1, 2], // Adjust margins to fit content better
                                filename: 'ICT_Access_Form.pdf',
                                image: {
                                    type: 'jpeg',
                                    quality: 0.98
                                },
                                html2canvas: {
                                    scale: 2,
                                    scrollX: 0,
                                    scrollY: 0
                                },
                                jsPDF: {
                                    unit: 'mm',
                                    format: 'a4',
                                    orientation: 'portrait',
                                    putOnlyUsedFonts: true,
                                    compress: true
                                }
                            };

                            html2pdf().from(element).set(options).save();
                        }

                        function approveForm(access_id) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
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



    function rejectForm(access_id) {
        Swal.fire({

            text: "Please provide a reason for rejection:",
            input: 'textarea',
            inputPlaceholder: 'Enter your reason here...',
            showCancelButton: true,
            confirmButtonText: 'Reject',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'You need to provide a reason!'
                }
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const reason = result.value;

                $.ajax({
                    method: 'POST',
                    url: '/reject_form',
                    data: {
                        access_id: access_id,
                        reason: reason
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Rejected!',
                            text: 'Form has been rejected.',
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
                        Swal.fire('Error!', 'Failed to reject form.', 'error');
                    }
                });
            }
        });
    }



                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
