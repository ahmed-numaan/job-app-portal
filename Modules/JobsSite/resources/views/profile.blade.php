@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="bg-white rounded p-4 shadow">
                    <h5 class="mb-4 text-center">Profile Photo</h5>
                    <div class="profile-photo-frame" id="photoFrame">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="file" class="form-control mb-2" id="photoUpload" accept="image/*">
                    <button class="btn btn-danger btn-sm w-100" id="deletePhoto">Delete Photo</button>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bg-white rounded p-4 shadow mb-4">
                    <h5 class="mb-4">Profile Information</h5>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="john@example.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>

                <div class="bg-white rounded p-4 shadow mb-4">
                    <h5 class="mb-4">Resume</h5>
                    <div id="resumeSection">
                        <p class="text-muted" id="noResume">No resume uploaded</p>
                        <div id="resumeInfo" style="display:none;">
                            <p><i class="fas fa-file-pdf text-danger"></i> <span id="resumeName">resume.pdf</span></p>
                            <button class="btn btn-danger btn-sm" id="deleteResume">Delete Resume</button>
                        </div>
                    </div>
                    <input type="file" class="form-control mt-3" id="resumeUpload" accept=".pdf,.doc,.docx">
                    <button class="btn btn-primary mt-2" id="uploadResume">Upload Resume</button>
                </div>

                <div class="bg-white rounded p-4 shadow">
                    <h5 class="mb-4">Cover Letter</h5>
                    <textarea class="form-control" rows="8" placeholder="Write your cover letter here..."></textarea>
                    <button class="btn btn-primary mt-3">Save Cover Letter</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection