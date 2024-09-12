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
                    max-width: 600px;
                    margin: 0 auto;
                }

                #signature-pad {
                    border: 2px solid #ccc;
                    border-radius: 10px;
                    width: 100%;
                    height: 200px;
                    margin-top: 10px;
                }

                .signature-actions {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 20px;
                }

                .signature-actions button {
                    width: 48%;
                }

                .signature-title {
                    font-size: 18px;
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
                        <button type="submit" id="save" class="btn btn-primary">Save Signature</button>
                    </div>
                </div>
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

                    const dataURL = signaturePad.toDataURL('image/png');
                    const img = new Image();
                    img.src = dataURL;
                    img.onload = function() {
                        const imgWidth = img.width;
                        const imgHeight = img.height;
                        const offscreenCanvas = document.createElement('canvas');
                        const offscreenCtx = offscreenCanvas.getContext('2d');

                        offscreenCanvas.width = imgWidth;
                        offscreenCanvas.height = imgHeight;
                        offscreenCtx.drawImage(img, 0, 0);

                        const boundingBox = {
                            left: imgWidth,
                            top: imgHeight,
                            right: 0,
                            bottom: 0
                        };

                        const imgData = offscreenCtx.getImageData(0, 0, imgWidth, imgHeight);
                        const data = imgData.data;

                        for (let y = 0; y < imgHeight; y++) {
                            for (let x = 0; x < imgWidth; x++) {
                                const index = (y * imgWidth + x) * 4;
                                if (data[index + 3] > 0) {
                                    boundingBox.left = Math.min(boundingBox.left, x);
                                    boundingBox.top = Math.min(boundingBox.top, y);
                                    boundingBox.right = Math.max(boundingBox.right, x);
                                    boundingBox.bottom = Math.max(boundingBox.bottom, y);
                                }
                            }
                        }

                        const {
                            left,
                            top,
                            right,
                            bottom
                        } = boundingBox;
                        const width = right - left;
                        const height = bottom - top;

                        const croppedCanvas = document.createElement('canvas');
                        const croppedCtx = croppedCanvas.getContext('2d');
                        croppedCanvas.width = width;
                        croppedCanvas.height = height;
                        croppedCtx.drawImage(
                            img,
                            left, top, width, height, // Source rectangle
                            0, 0, width, height // Destination rectangle
                        );

                        const croppedDataURL = croppedCanvas.toDataURL('image/png');
                        signatureInput.value = croppedDataURL;
                        signatureForm.submit();
                    };
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/signature/index.blade.php ENDPATH**/ ?>