<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Permissions</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="role-select" class="form-label">Select Role</label>
                                    <select id="role-select" class="form-select">
                                        <option value="">Select a role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <form id="permissions-form" method="POST" action="<?php echo e(route('role.updatePermissions')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="role_id" id="role-id">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">ID</th>
                                                <th style="width: 50%;">Permission Name</th>
                                                <th style="width: 20%;">Change Permission</th>
                                                <th style="width: 20%;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody id="permissions-table-body">
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($permission->id); ?></td>
                                                    <td><?php echo e($permission->name); ?></td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="permissions[]" value="<?php echo e($permission->name); ?>"
                                                                id="permission-<?php echo e($permission->id); ?>">
                                                            <label class="form-check-label"
                                                                for="permission-<?php echo e($permission->id); ?>"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm delete-btn mx-2"
                                                            onclick="deletePermission(<?php echo e($permission->id); ?>)">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="<?php echo e(route('permission.create')); ?>" class="btn btn-success ms-2">Add New</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role-select');
            const roleIdInput = document.getElementById('role-id');
            const permissionsTableBody = document.getElementById('permissions-table-body');

            roleSelect.addEventListener('change', function() {
                const roleId = this.value;
                roleIdInput.value = roleId; // Set the hidden input field with the selected role ID

                if (roleId) {
                    fetch(`/role/${roleId}/permissions`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(permission => {
                                const checkbox = document.getElementById(`permission-${permission.id}`);
                                checkbox.checked = permission.active;
                            });
                        })
                        .catch(error => console.error('Error fetching permissions:', error));
                } else {
                    // Uncheck all checkboxes if no role is selected
                    const checkboxes = permissionsTableBody.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = false;
                    });
                }
            });
        });

        function deletePermission(permissionId) {
            if (confirm("Are you sure you want to delete this permission?")) {
                fetch(`/permission/${permissionId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Reload the page or update the UI as needed
                            window.location.reload(); // Example: Reloads the page
                        } else {
                            console.error('Failed to delete permission');
                        }
                    })
                    .catch(error => console.error('Error deleting permission:', error));
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\E-docs\resources\views/role-permission/permission/index.blade.php ENDPATH**/ ?>