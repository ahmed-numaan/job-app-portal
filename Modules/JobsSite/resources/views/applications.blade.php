@extends('jobssite::components.layouts.master')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(rgba(43, 57, 64, .05), rgba(43, 57, 64, .05));">
    <div class="container">
        <div class="bg-white rounded p-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">My Applications</h4>
                <button class="btn btn-danger" id="deleteSelected" disabled>Delete Selected</button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" data-id="1"></td>
                            <td>1</td>
                            <td>Software Engineer</td>
                            <td>Tech Corp</td>
                            <td>2024-12-15</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary view-btn" data-id="1">View</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="1">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" data-id="2"></td>
                            <td>2</td>
                            <td>Marketing Manager</td>
                            <td>Marketing Inc</td>
                            <td>2024-12-10</td>
                            <td><span class="status-badge status-reviewed">Reviewed</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary view-btn" data-id="2">View</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="2">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" data-id="3"></td>
                            <td>3</td>
                            <td>Product Designer</td>
                            <td>Design Studio</td>
                            <td>2024-12-05</td>
                            <td><span class="status-badge status-accepted">Accepted</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary view-btn" data-id="3">View</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="3">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" data-id="4"></td>
                            <td>4</td>
                            <td>Data Analyst</td>
                            <td>Analytics Co</td>
                            <td>2024-12-01</td>
                            <td><span class="status-badge status-rejected">Rejected</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary view-btn" data-id="4">View</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="4">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="row-checkbox" data-id="5"></td>
                            <td>5</td>
                            <td>HR Specialist</td>
                            <td>People First</td>
                            <td>2024-11-28</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary view-btn" data-id="5">View</button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="5">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection