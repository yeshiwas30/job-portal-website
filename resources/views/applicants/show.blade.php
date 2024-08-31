@extends('layouts.app')

@section('content')
    <h1>Job Applicant Details</h1>
    <p>Status: {{ $applicant->status }}</p>
    <p>Job Post: {{ $applicant->jobPost->title }}</p>
    <p>Employee: {{ $applicant->employee->name }}</p
@endsection

@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mt-5">
                <h1>{{ $job_post->title }}</h1>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
            </div>

            @foreach($users->users as $user)
                <div class="card mt-5 {{ $user->pivot->shortlisted ? 'card-bg' : '' }}">
                    <div class="row g-0">
                        <div class="col-auto">
                            @if($user->profilepic)
                                <img src="{{ Storage::url($user->profilepic) }}" class="rounded-circle" style="width: 150px;" alt="Profile Picture">
                            @else
                                <img src="https://placehold.co/400" class="rounded-circle" style="width: 150px;" alt="Profile Picture">
                            @endif
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <p class="fw-bold">{{ $user->name }}</p>
                                <p class="card-text">{{ $user->phonenumber }}</p>
                                <p class="card-text">Applied on: {{ $user->pivot->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .card-bg {
            background-color: green;
        }
    </style>
@endsection
