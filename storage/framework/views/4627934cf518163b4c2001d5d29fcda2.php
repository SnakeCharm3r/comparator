<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                .signature-container {
                    max-width: 400px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f9f9f9;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }

                #signature-pad {
                    border: 2px solid #007bff;
                    /* Blue border */
                    border-radius: 10px;
                    width: 100%;
                    height: 50px;
                    /* Height adjusted for better visibility */
                    margin-top: 10px;
                    background-color: #fff;
                    /* White background for clarity */
                }

                .signature-actions {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 20px;
                }

                .signature-actions button {
                    width: 48%;
                    padding: 10px;
                    font-size: 16px;
                }

                .signature-title {
                    font-size: 24px;
                    /* Larger title */
                    margin-bottom: 5px;
                    color: #333;
                    text-align: center;
                }

                .signature-note {
                    text-align: center;
                    font-size: 14px;
                    color: #666;
                    margin-bottom: 15px;
                }

                .alert {
                    margin-top: 20px;
                }
            </style>

            <div class="container signature-container mt-5">
                <h2 class="signature-title">Please Sign Below</h2>
                <p class="signature-note">Use your mouse or touch screen to provide your signature.</p>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="signature-pad" class="signature-pad"></canvas>
                    </div>
                    <div class="col-md-12 signature-actions">
                        <button type="button" id="clear" class="btn btn-outline-danger">Clear</button>
                        <button type="button" id="save" class="btn btn-primary">Save Signature</button>
                    </div>
                </div>
                <?php if(session('message')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>

                <form id="signature-form" action="<?php echo e(route('signature.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="signature-input" name="signature">
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
            <script>
                const clearButton = document.getElementById('clear');
                const saveButton = document.getElementById('save');
                const signatureForm = document.getElementById('signature-form');
                const signatureInput = document.getElementById('signature-input');
                const canvas = document.getElementById('signature-pad');
                const signaturePad = new SignaturePad(canvas, {
                    penColor: 'rgb(0, 0, 255)' // Set pen color to blue
                });

                // Resize canvas to fit its container
                function resizeCanvas() {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    const ctx = canvas.getContext('2d');
                    ctx.scale(ratio, ratio);
                    signaturePad.clear(); // Clear canvas to avoid incorrect isEmpty() results
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

                    const dataURL = signaturePad.toDataURL('image/png');
                    signatureInput.value = dataURL;
                    signatureForm.submit();
                });

                // Adjusting for pointer alignment
                function getMousePosition(event) {
                    const rect = canvas.getBoundingClientRect();
                    return {
                        x: (event.clientX - rect.left) * (canvas.width / rect.width),
                        y: (event.clientY - rect.top) * (canvas.height / rect.height)
                    };
                }

                // Mouse events
                canvas.addEventListener('mousedown', (event) => {
                    signaturePad.beginStroke(getMousePosition(event));
                });

                canvas.addEventListener('mousemove', (event) => {
                    if (!signaturePad.isEmpty()) {
                        signaturePad.stroke(getMousePosition(event));
                    }
                });

                canvas.addEventListener('mouseup', () => {
                    signaturePad.endStroke();
                });

                // Touch events for mobile devices
                canvas.addEventListener('touchstart', (event) => {
                    const touch = event.touches[0];
                    signaturePad.beginStroke(getMousePosition(touch));
                    event.preventDefault();
                }, false);

                canvas.addEventListener('touchmove', (event) => {
                    if (!signaturePad.isEmpty()) {
                        const touch = event.touches[0];
                        signaturePad.stroke(getMousePosition(touch));
                    }
                    event.preventDefault();
                }, false);

                canvas.addEventListener('touchend', () => {
                    signaturePad.endStroke();
                }, false);
            </script>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FAMILY PC\Documents\GitHub\E-docs\resources\views/signature/index.blade.php ENDPATH**/ ?>