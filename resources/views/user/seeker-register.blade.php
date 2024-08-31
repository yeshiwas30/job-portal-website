@extends('layouts.app')

@section('content')
@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="col-span-1 md:col-span-1">
            <h1 class="text-3xl font-bold">Looking for a job?</h1>
            <h3>Please create an account</h3>
            <img src="/it-engineer-working-with-his-pc.jpeg" width="580" class="img-responsibe">
        </div>

        <div class="col-span-1 md:col-span-1 mt-5 mb-5">
            <div class="card" id="card" style="margin-top:50px;">
                <div class="card-header">Register</div>
                <form action="#" method="post" id="registrationForm" class="card-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-input" required>
                        @if($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-input" required>
                        @if($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-input" required>
                        @if($errors->has('age'))
                            <span class="text-danger">{{ $errors->first('age')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender" class="block text-gray-700">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @if($errors->has('gender'))
                            <span class="text-red-500 text-sm">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pic" class="block text-gray-700">Head Of Shot Photo</label>
                        <div class="flex items-center mt-2">
                            <input type="file" name="pic" id="pic" class="form-input" accept="image/*" required>
                            <button type="button" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300" onclick="openGallery()">From Gallery</button>
                            <button type="button" class="ml-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring focus:border-green-300" onclick="openCamera()">From Camera</button>
                        </div>
                        @if($errors->has('pic'))
                            <span class="text-red-500 text-sm">{{ $errors->first('pic') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pic" class="block text-gray-700">Kebele Id</label>
                        <div class="flex items-center mt-2">
                            <input type="file" name="pic" id="pic" class="form-input" accept="image/*" required>
                            <button type="button" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300" onclick="openGallery()">From Gallery</button>
                            <button type="button" class="ml-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring focus:border-green-300" onclick="openCamera()">From Camera</button>
                        </div>
                        @if($errors->has('pic'))
                            <span class="text-red-500 text-sm">{{ $errors->first('pic') }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group mb-5 mt-3">
                        <button class="btn btn-dark" id="btnRegister">Register</button>
                    </div>
                </form>
            </div>
            <div id="message" class="mt-2"></div>
        </div>
    </div>
</div>

<script>
    var url = "{{route('store.seeker')}}";
    document.getElementById("btnRegister").addEventListener("click", function(event) {
        var form = document.getElementById("registrationForm");
        var card = document.getElementById("card");
        var messageDiv = document.getElementById('message')
        messageDiv.innerHTML = ''
        var formData = new FormData(form)

        var button = event.target
        button.disabled = true;
        button.innerHTML = 'Sending phone_number.... '

        fetch(url, {
            method: "POST",
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            body: formData
        }).then(response => {
            if(response.ok) {
                return response.json();
            } else {
                throw new Errror('Error')
            }
        }).then(data => {
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = '<div class="alert alert-success">Registration was successful.Please check your email to verify it</div>'
            card.style.display = 'none'
        }).catch(error => {
            console.log(error)
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = '<div class="alert alert-danger">Something went wrong. Please try again</div>'
        })
    })
</script>

@endsection
