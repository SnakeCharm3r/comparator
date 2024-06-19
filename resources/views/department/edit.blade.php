
<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="mb-3">
            <label for="dept_name" class="form-label">Department Name</label>
            <input type="text" class="form-control" id="dept_name" name="dept_name" value="{{ $department->dept_name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $department->description }}</textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
