    <style>
        .form-container {
            margin: 20px auto;
            max-width: 1100px;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header img {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .form-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .table-custom th,
        .table-custom td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        .table-custom {
            width: 100%;
            border-collapse: collapse;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .footer p {
            margin: 0;
        }

        .footer .contact-info {
            margin-top: 10px;
        }

        .buttons-container {
            text-align: right;
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .buttons-container .btn {
            margin-left: 5px;
        }
    </style>

    @extends('layouts.template')
    @section('breadcrumb')
        @include('sweetalert::alert')
        <div class="page-wrapper">
            <div class="content container">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-sub-header">
                                <h3 class="page-title">IT Access Form</h3>

                            </div>
                        </div>
                    </div>
                </div>
                <section>
                    <div class="form-container">
                        <div class="form-header">
                            <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo">
                            <p><strong>Comprehensive Community Based Rehabilitation in Tanzania</strong></p>
                            <h3>IT Access Form</h3>
                        </div>
                        {{-- {{dd($ictForm)}} --}}
                        <table class="table table-custom">
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                    <td>{{ $ictForm->username }}</td>

                                    <td>Mobile Number</td>
                                    <td>{{ $ictForm->mobile }}</td>
                                </tr>
                                {{-- //utamalizia data --}}
                                <tr>
                                    <td>User Category</td>
                                    <td>Admin</td>

                                    <td>Aruti HR MIS</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>Starting Date</td>
                                    <td>2022-01-01</td>

                                    <td>Remark</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td>PABX</td>
                                    <td>Enabled</td>

                                    <td>First Name</td>
                                    <td>John</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $ictForm->email }}</td>

                                    <td>Department</td>
                                    <td>IT</td>
                                </tr>
                                <tr>
                                    <td>Active Directory</td>
                                    <td>Admin</td>

                                    <td>Ending Date</td>
                                    <td>2022-12-31</td>
                                </tr>
                                <tr>
                                    <td>Employee ID</td>
                                    <td>E12345</td>

                                    <td>Hardware</td>
                                    <td>
                                        <ul>
                                            <li>Laptop</li>
                                            <li>Desktop</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>Doe</td>

                                    <td>Employment Type</td>
                                    <td>Full-time</td>
                                </tr>
                                <tr>
                                    <td>NHIF Qualification</td>
                                    <td>Yes</td>

                                    <td>HMIS Access</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>CCBRT Email</td>
                                    <td>Enabled</td>

                                    <td>SAP ERP</td>
                                    <td>Enabled</td>
                                </tr>
                                <tr>
                                    <td>Network Access VPN</td>
                                    <td>Enabled</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="footer">
                            <p><strong>Organization Name</strong></p>
                            <p>Address: 123 Main Street, City, Country</p>
                            <p class="contact-info">Phone: (123) 456-7890 | Email: contact@organization.com</p>
                        </div>
                    </div>
                    <div class="buttons-container">
                        <button type="button" class="btn btn-primary  "
                            onclick="aproveForm({{ $ictForm->access_id }})">Approve</button>
                        <button type="button" class="btn btn-primary ">Edit</button>
                        <button type="button" class="btn btn-primary" onclick="generatePDF()">Download PDF</button>
                    </div>
                </section>



                {{-- {{dump($ictForm)}} --}}

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

        <script>
            function generatePDF() {
                const element = document.querySelector('.form-container');
                html2pdf().from(element).save('Official_Document.pdf');
            }


            function aproveForm(access_id) {
                // Setting up CSRF token for AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Displaying the confirmation alert
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
                        // If confirmed, send AJAX request to approve the form
                        $.ajax({
                            method: 'POST',
                            url: '/approve_form',
                            data: {
                                access_id: access_id
                            },
                            success: function(response) {
                                // If successful, show success message and redirect
                                Swal.fire({
                                    title: 'Approved!',
                                    text: 'Form has been approved.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Redirect to the request approval page
                                        window.location.href = '/requestapprove';
                                    }
                                });
                            },
                            error: function(xhr, status, error) {
                                // Handle errors and display an error message
                                console.error('Error:', error);
                                Swal.fire(
                                    'Error!',
                                    'Failed to approve form.',
                                    'error'
                                );
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // If the action is cancelled, show cancellation message
                        Swal.fire(
                            'Cancelled',
                            'The form was not approved :)',
                            'error'
                        );
                    }
                });
            }
        </script>
