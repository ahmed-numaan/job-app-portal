@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="bg-white rounded p-4 shadow">
                    <h5 class="mb-4">Filters</h5>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Keyword</label>
                        <input type="text" class="form-control" placeholder="Job title, skills...">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Categories</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat1">
                            <label class="form-check-label" for="cat1">Marketing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat2">
                            <label class="form-check-label" for="cat2">Customer Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat3">
                            <label class="form-check-label" for="cat3">Human Resource</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat4">
                            <label class="form-check-label" for="cat4">Project Management</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat5">
                            <label class="form-check-label" for="cat5">Development</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cat6">
                            <label class="form-check-label" for="cat6">Design</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Location</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="onsite">
                            <label class="form-check-label" for="onsite">On-Site</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remote">
                            <label class="form-check-label" for="remote">Remote</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hybrid">
                            <label class="form-check-label" for="hybrid">Hybrid</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Salary Range</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Min">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Max">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="fulltime">
                            <label class="form-check-label" for="fulltime">Full-time</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="parttime">
                            <label class="form-check-label" for="parttime">Part-time</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="contract">
                            <label class="form-check-label" for="contract">Contract</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="internship">
                            <label class="form-check-label" for="internship">Internship</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Experience</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="junior">
                            <label class="form-check-label" for="junior">Junior</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="midlevel">
                            <label class="form-check-label" for="midlevel">Mid-Level</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="senior">
                            <label class="form-check-label" for="senior">Senior</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="lead">
                            <label class="form-check-label" for="lead">Lead</label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100">Search</button>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="mb-3">
                    <h5>Search Results (24 Jobs Found)</h5>
                </div>

                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('usertheme/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h5 class="mb-3">Software Engineer</h5>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$80,000 - $120,000</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <a class="btn btn-primary" href="">Apply Now</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: 01 Jan, 2025</small>
                        </div>
                    </div>
                </div>

                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('usertheme/img/com-logo-2.jpg')}}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h5 class="mb-3">Marketing Manager</h5>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Remote</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$70,000 - $100,000</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <a class="btn btn-primary" href="">Apply Now</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: 15 Jan, 2025</small>
                        </div>
                    </div>
                </div>

                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('usertheme/img/com-logo-3.jpg')}}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h5 class="mb-3">Product Designer</h5>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>San Francisco, USA</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$90,000 - $130,000</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <a class="btn btn-primary" href="">Apply Now</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: 20 Jan, 2025</small>
                        </div>
                    </div>
                </div>

                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('usertheme/img/com-logo-4.jpg')}}" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h5 class="mb-3">HR Specialist</h5>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>Chicago, USA</span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Part Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$50,000 - $70,000</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <a class="btn btn-primary" href="">Apply Now</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Deadline: 25 Jan, 2025</small>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection