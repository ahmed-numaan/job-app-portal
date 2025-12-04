<div class="modal fade" id="companyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalTitle">Add Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="companyForm">
                    @csrf
                    <input type="hidden" name="id" id="companyId">

                    <div class="mb-3">
                        <label>Company Name</label>
                        <input type="text" class="form-control" name="name" id="companyName">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" id="contactPerson">
                        <div class="invalid-feedback"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="companyEmail">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" id="companyWebsite">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" id="companyPhone">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <textarea class="form-control" name="address" id="companyAddress"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" id="companyLogo">
                        <div class="invalid-feedback"></div>
                        <img id="logoPreview" src="" class="img-fluid mt-2" style="max-height: 100px; display: none;">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="companyDescription"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveCompanyBtn">Save</button>
            </div>
        </div>
    </div>
</div>
