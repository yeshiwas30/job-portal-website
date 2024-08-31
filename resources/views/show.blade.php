@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{Storage::url($employee_profiles->profile_pic)}}" class="card-img-top" alt="Cover Image" style="height: 250px; object-fit: cover;">
                <div class="card-body">
            
                    <a href="{{route('profile',[$employee_profiles->profile->id])}}">
                        <img src="{{Storage::url($employee_profiles->profile->profile_pic)}}" width="60" class="rounded-circle">
                    </a>
                    <b>{{$employee_profiles->profile->first_name}}</b>                    <b>{{$employee_profiles->profile->name}}</b>                    <b>{{$employee_profiles->profile->name}}</b>                    <b>{{$employee_profiles->profile->name}}</b>
                    <b>{{$employee_profiles->profile->last_name}}</b>
					<b>{{$employee_profiles->profile->age}}</b>
					<b>{{$employee_profiles->profile->gender}}</b>
					<b>{{$employee_profiles->profile->phone_number}}</b>
					<b>{{$employee_profiles->profile->job_category}}</b>
					<b>{{$employee_profiles->profile->description}}</b>
					<b>{{$employee_profiles->profile->kebele_id}}</b>
					<b>{{$employee_profiles->profile->created_at}}</b>
					<b>{{$employee_profiles->profile->employee_id}}</b>
                    <h2 class="card-title">{{$job_posts->title}}</h2>
					 @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    <h2 class="card-location">{{$job_posts->location}}</h2>
                    <h2 class="card-type">{{$job_posts->type}}</h2>                   
                    @endif
                    <h2 class="card-job_posts"><p>Salary: ${{number_format{{$job_posts->salary_wage}}</p></h2>
                    <h2 class="card-responsibility">{{$job_posts->responsibility}}</h2>
                    <h2 class="card-requirement">{{$job_posts->requirement}}</h2>
                    <h2 class="card-description">{{$job_posts->description}}</h2>
                    <h2 class="card-created_at">{{$job_posts->created_at}}</h2>
                    <h2 class="card-job_post_id">{{$job_posts->job_post_id}}</h2>
                    <h4 class="mt-4">Description</h4>

                    <h4>Roles and Responsibilities</h4>
                    {!!$users->roles!!}

                    <p class="card-text mt-4">Application closing date: {{$job_applicants->application_close_date}}</p>
                    @if(Auth::check())
                    <form action="{{route('applicantion.submit',[$job_applicants->id])}}" method="POST">@csrf
                        <button href="#" class="btn btn-dark btn-lg mt-3">Apply Now</button>
                    </form>
                    @else

                    <button type="button" class="btn btn-dark btn-lg " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Apply
                    </button>

                    </form>
                    @endif
                    @else
                    <p>Please login to apply</p>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{route('applicantion.submit',[$listing->id])}}" method="POST">@csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload resume</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnApply" disabled class="btn btn-success btn-lg">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const inputElement = document.querySelector('input[type="file"]');
    const pond = FilePond.create(inputElement);
    pond.setOptions({
        server: {
            url: '/resume/upload',
            process: {
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                ondata: (formData) => {
                    formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                    return formData
                },
                onload: (response) => {
                    document.getElementById('btnApply').removeAttribute('disabled')
                },
                onerror: (response) => {
                    console.log('error while uploading....', response)
                },

            },
        },
    });
</script>
@endsection