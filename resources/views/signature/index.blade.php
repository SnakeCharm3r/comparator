@extends('layouts.template')

@section('breadcrumb')
    @include('sweetalert::alert')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Signature</h3>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                #signature-pad {
                    border: 1px solid hsl(0, 0%, 0%);
                    border-radius: 5px;
                    width: 100%;
                    height: 500px;
                }
            </style>
            <div class="container mt-5">
                <h2>Capture Signature</h2>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="signature-pad" class="signature-pad"></canvas>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button id="clear" class="btn btn-danger">Clear</button>
                        <button id="save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
            <script>
                const canvas = document.getElementById('signature-pad');
                const signaturePad = new SignaturePad(canvas);
                const clearButton = document.getElementById('clear');
                const saveButton = document.getElementById('save');

                // Resize canvas to fit its container
                function resizeCanvas() {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    canvas.getContext('2d').scale(ratio, ratio);
                    signaturePad.clear(); // otherwise isEmpty() might return incorrect value
                }

                window.addEventListener('resize', resizeCanvas);
                resizeCanvas();

                clearButton.addEventListener('click', () => {
                    signaturePad.clear();
                });

                saveButton.addEventListener('click', () => {
                    if (signaturePad.isEmpty()) {
                        alert('Please provide a signature first.');
                        return;
                    }

                    const dataURL = signaturePad.toDataURL();

                    fetch('/save-signature', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            signature: dataURL
                        })
                    }).then(response => {
                        if (response.ok) {
                            alert('Signature saved successfully.');
                        } else {
                            alert('Failed to save signature.');
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                    });
                });

                // Add touch event support for mobile devices
                canvas.addEventListener('touchstart', (event) => {
                    const touch = event.touches[0];
                    const mouseEvent = new MouseEvent('mousedown', {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);

                canvas.addEventListener('touchmove', (event) => {
                    const touch = event.touches[0];
                    const mouseEvent = new MouseEvent('mousemove', {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(mouseEvent);
                }, false);

                canvas.addEventListener('touchend', (event) => {
                    const mouseEvent = new MouseEvent('mouseup', {});
                    canvas.dispatchEvent(mouseEvent);
                }, false);
            </script>
        </div>
    </div>
@endsection
