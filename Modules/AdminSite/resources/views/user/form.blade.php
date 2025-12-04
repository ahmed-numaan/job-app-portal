<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="userForm">
                    @csrf
                    <input type="hidden" name="id" id="userId">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" id="userName">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="userEmail">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-select" id="userRole">
                            <option value="job_seeker">Job Seeker</option>
                            <option value="employer">Employer</option>
                            <option value="admin">Admin</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3 passwordField">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="userPassword">
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveUserBtn">Save</button>
            </div>
        </div>
    </div>
</div>
