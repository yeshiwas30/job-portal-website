@extends('layouts.admin.main')
@section('content')

<div class="container mt-5">
    <div class="flex justify-center">
        <div class="w-full md:w-1/2 mt-5">

            <h1 class="text-2xl font-bold">Update a job</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('job.update', [$job_post->id]) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title Of Job</label>
                    <input type="text" name="title" id="title" class="form-input">
                    @error('title')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" name="description" class="form-input summernote"></textarea>
                    @error('description')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="roles" class="block text-gray-700">Roles and Responsibility</label>
                    <textarea id="roles" name="roles" class="form-input summernote"></textarea>
                    @error('roles')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="job_type" class="block text-gray-700">Job types</label>
                    <div class="flex">
                        <label class="flex items-center mr-4">
                            <input type="radio" class="form-radio" name="job_type" value="Fulltime">
                            <span class="ml-2">Fulltime</span>
                        </label>
                        <label class="flex items-center mr-4">
                            <input type="radio" class="form-radio" name="job_type" value="Parttime">
                            <span class="ml-2">Parttime</span>
                        </label>
                        <label class="flex items-center mr-4">
                            <input type="radio" class="form-radio" name="job_type" value="Casual">
                            <span class="ml-2">Casual</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" class="form-radio" name="job_type" value="Contract">
                            <span class="ml-2">Contract</span>
                        </label>
                    </div>
                    @error('job_type')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Address</label>
                    <input type="text" name="location" id="location" class="form-input">
                    @error('location')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="salary" class="block text-gray-700">Salary</label>
                    <input type="text" name="salary" id="salary" class="form-input">
                    @error('salary')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Application closing date</label>
                    <input type="text" name="date" id="datepicker" class="form-input" value="{{ $listing->application_close_date }}">
                    @error('date')
                        <div class="text-red-500 font-bold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Update Job</button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .note-insert {
        display: none!important;
    }

    .text-red-500 {
        color: #e53e3e;
    }

    .font-bold {
        font-weight: 700;
    }
</style>
@ensection
