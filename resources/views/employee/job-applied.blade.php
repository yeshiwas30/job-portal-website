@extends('layouts.app')

@section('content')

<div class="container mt-5">
<div class="row mt-5">
    <div class="col-md-8">
      <h3>Applied jobs</h3>
      @foreach($users as $user)
      @foreach($user->job_applicants as $job_applicant)
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">{{$job_applicant->title}}</h5>
          <p class="card-text">Applied:{{$job_applicant->pivot->created_at}} </p>
          <a href="{{route('job.show',[$listing->slug])}}" class="btn btn-dark">View</a>
        </div>
      </div>   
    @endforeach
    @endforeach
    </div>
  </div>
</div>

@endsection