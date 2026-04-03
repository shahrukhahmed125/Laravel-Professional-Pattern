<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div class="container my-4">
    <h2 class="mb-4">Projects</h2>

    <div class="row">
        <!-- Add Project -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <strong>Add New Project</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Project Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add Project</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Projects List (table with edit/delete modals) -->
        <div class="col-md-8">
            @if ($projects)
                <div class="card shadow-sm">
                    <div class="card-header">
                        <strong>Projects List</strong>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 60px;">#</th>
                                        <th>Project Name</th>
                                        <th>Description</th>
                                        <th style="width: 180px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 400px;">
                                                    {{ $project->description }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <!-- Edit Button (opens modal) -->
                                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editModal-{{ $project->id }}">
                                                        Edit
                                                    </button>

                                                    <!-- Delete Button (opens modal) -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $project->id }}">
                                                        Delete
                                                    </button>

                                                    <div class="ms-auto text-muted align-self-center">
                                                        <small>Project #{{ $project->id }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $project->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $project->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel-{{ $project->id }}">Edit Project #{{ $project->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('update', $project->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Project Name</label>
                                                                <input type="text" name="name" value="{{ $project->name }}" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Description</label>
                                                                <textarea name="description" class="form-control" rows="5" required>{{ $project->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $project->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $project->id }}">Delete Project #{{ $project->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete the project "<strong>{{ $project->name }}</strong>"? This action cannot be undone.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('destroy', $project->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes, delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info">No projects found. Add your first project using the form on the left.</div>
            @endif
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>