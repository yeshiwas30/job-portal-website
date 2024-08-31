
@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Job Applicants
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Applicant ID</th>
                                <th>Status</th>
                                <th>Job Title</th>
                                <th>Created on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $applicant)
                                <tr>
                                    <td>{{ $applicant->id }}</td>
                                    <td>{{ $applicant->status }}</td>
                                    <td>{{ $applicant->jobPost->title }}</td>
                                    <td>{{ $applicant->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('job-applicants.show', $applicant->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
