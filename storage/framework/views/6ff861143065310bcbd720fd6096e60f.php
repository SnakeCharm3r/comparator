<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
            
            <div class="card card-body p-3">
                <div class="table-responsive">
                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                
                                
                                <th>CCBRT Code</th>
                                <th>Phone Number</th>
                                
                                <th>Birth Date</th>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <th>Actions</th>
                                


                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></td>
                                    <td><?php echo e($user->department->dept_name); ?></td>
                                    <td><?php echo e($user->job_title); ?></td>
                                    
                                    <td><?php echo e($user->ccbrt_Code); ?></td>
                                    
                                    <td><?php echo e($user->mobile); ?></td>
                                    
                                    <td><?php echo e(\Carbon\Carbon::parse($user->DOB)->format('d-m-Y')); ?></td>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <td class="text-center" style="width: 100px;">
                                        <!-- View Icon -->

                                        <a href="<?php echo e(route('employees_details.edit', ['id' => $user->id])); ?>"
                                            class="btn btn-sm btn-outline-success d-flex align-items-center"
                                            title="View Details">
                                            <i class="fas fa-eye mr-2" aria-hidden="true"></i> View
                                        </a>



                                    </td>
                                    


                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Department</th>
                                <th>Job Title</th>
                                
                                
                                <th>CCBRT Code</th>
                                <th>Phone Number</th>
                                
                                <th>Birth Date</th>
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                <th>Actions</th>
                                
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/employees_details/index.blade.php ENDPATH**/ ?>