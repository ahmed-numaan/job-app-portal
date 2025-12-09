<div class="modal fade" id="VacancyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vacancyModalTitle">Add Vacancy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="vacancyForm">
                    @csrf
                    <input type="hidden" name="id" id="vacancyId">

                    <div class="mb-3">
                        <label>Job Title</label>
                        <input type="text" class="form-control" name="title" id="vacancyTitle">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Location</label>
                        <select class="form-select" name="location" id="location">
                            <option value="">Select</option>
                            <option value="onsite">On-Site</option>
                            <option value="remote">Remote</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Company</label>
                        <select class="form-select" name="company_id" id="companyId">
                            <option value="">Select</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Job Type</label>
                        <select class="form-select" name="vacancy_type" id="vacancyType">
                            <option value="">Select</option>
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                            <option value="contract">Contractual</option>
                            <option value="internship">Internship</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Experience Level</label>
                        <select class="form-select" name="experience_level" id="experienceLevel">
                            <option value="">Select</option>
                            <option value="junior">Junior</option>
                            <option value="mid">Mid-Level</option>
                            <option value="senior">Senior</option>
                            <option value="lead">Lead</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Minimum Salary</label>
                        <input type="text" class="form-control formatted_input" name="salary_min" id="minSalary">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Maximum Salary</label>
                        <input type="text" class="form-control formatted_input" name="salary_max" id="maxSalary">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Skills</label>
                        <select class="form-select" name="skills[]" id="skillIds" multiple>
                            <option value="">Select</option>
                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Application Start</label>
                        <div class="input-group date_picker" 
                            id="dateStart" 
                            data-td-target-input="nearest"
                            data-td-target-toggle="nearest"
                            data-disable="past">

                            <input type="text" 
                                class="form-control" 
                                name="date_start" 
                                data-td-target="#dateStart"
                                data-td-toggle="datetimepicker"
                                readonly> <!-- 🔑 add toggle here -->

                            <span class="input-group-text" 
                                data-td-toggle="datetimepicker" 
                                data-td-target="#dateStart">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Application End</label>

                        <div class="input-group date_picker" 
                            id="dateEnd" 
                            data-td-target-input="nearest"
                            data-td-target-toggle="nearest"
                            data-disable="past">

                            <input type="text" 
                                class="form-control" 
                                name="date_end" 
                                data-td-target="#dateEnd"
                                data-td-toggle="datetimepicker"
                                readonly> <!-- 🔑 add toggle here -->

                            <span class="input-group-text" 
                                data-td-toggle="datetimepicker" 
                                data-td-target="#dateEnd">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </div>

                        <div class="invalid-feedback"></div>
                    </div>


                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label>Is Active?</label>
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="isActive" checked>
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveVacancyBtn">Save</button>
            </div>
        </div>
    </div>
</div>
