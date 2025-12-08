<div class="modal fade" id="skillModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillModalTitle">Add Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="skillForm">
                    @csrf
                    <input type="hidden" name="id" id="skillId">

                    <div class="mb-3">
                        <label>Skill Name</label>
                        <input type="text" class="form-control" name="name" id="skillName">
                        <div class="invalid-feedback"></div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveSkillBtn">Save</button>
            </div>
        </div>
    </div>
</div>
