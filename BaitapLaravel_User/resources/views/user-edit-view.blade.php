@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <form action='{{route('update_user', $user->id)}}' method='POST'>
            {{ csrf_field() }}
            <div class="form-group row">
            <h1>Edit User</h1>
{{--            @error('user')--}}
{{--            <div class="alert alert-danger" role="alert">--}}
{{--                <strong>{{$message}}</strong>--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--            @error('username')--}}
{{--            <div class="alert alert-danger" role="alert">--}}
{{--                <strong>{{$message}}</strong>--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--            @error('email')--}}
{{--            <div class="alert alert-danger" role="alert">--}}
{{--                <strong>{{$message}}</strong>--}}
{{--            </div>--}}
{{--            @enderror--}}
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        User  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='user' id="user" value="{{$user->user}}">
                </div>
                <p class="error" id="userErr" > </p>
            </div>

            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        UserName  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='username' id="username" value="{{$user->username}}">
                </div>
                <p class="error" id="usernameErr" > </p>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Email  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control"  placeholder="@Email.com" name='email' id="email" value="{{$user->email}}">
                </div>
                <p class="error" id="emailErr" > </p>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Address
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='address' id="address" value="{{$user->address}}">
                </div>
                <p class="error" id="addressErr" > </p>
            </div>
            <div class="form-group row">
            <button type="button" class="btn btn-info btn-lg" onclick="UpdateUser({{$user->id}})">Update</button>
                <a href="{{route('show_list')}}" class="btn btn-default btn-lg">Cancel</a>
            </div>
        </form>

        <script type="text/javascript">
            "use strict";
             function UpdateUser(id)
            {
                let user = document.getElementById('user').value;
                let username = document.getElementById('username').value;
                let email = document.getElementById('email').value;
                let address = document.getElementById('address').value;
                var submitData = {
                    id: id,
                    user: user,
                    username: username,
                    email: email,
                    address: address,
                }
                var userErr = document.getElementById("userErr");
                var usernameErr = document.getElementById("usernameErr");
                var emailErr = document.getElementById("emailErr");
                var addressErr = document.getElementById("addressErr");
                axios.post('/Laravel_Pr/BaitapLaravel_User/public/edit', submitData)
                    .then(function (response) {
                        alert(response.data.success);
                        window.location.href ="{{route('show_list')}}";
                        //  console.log(response);
                    })
                    .catch(function (error) {

                        console.log(error.response)
                        // user  = error.response.data.errors.user != null ? error.response.data.errors.user+ '\n' : '';
                        // username  = error.response.data.errors.username != null ? error.response.data.errors.username+ '\n' : '';
                        // email  = error.response.data.errors.email != null ? error.response.data.errors.email+ '\n' : '';
                        // address  = error.response.data.errors.address != null ? error.response.data.errors.address+ '\n' : '';
                        // userErr.innerText=user;
                        // usernameErr.innerText=username;
                        // emailErr.innerText=email;
                        // addressErr.innerText=address;

                    });

            }
        </script>

    </div>
</div>
@endsection
