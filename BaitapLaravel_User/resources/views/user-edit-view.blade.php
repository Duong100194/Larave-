<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

    <style>
        .error {color: #FF0000;}
    </style>
    <title> Edit User </title>
</head>
<body>
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
                <p class="error" id="errorMessage" > </p>
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        User  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='user' id="user" value="{{$user->user}}">
                </div>
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
                    var errorMessage = document.getElementById("errorMessage");
                    axios.post('/Laravel_Pr/BaitapLaravel_User/public/edit', submitData)
                        .then(function (response) {
                            alert(response.data.success);
                            window.location.href ="{{route('show_list')}}";
                            //  console.log(response);
                        })
                        .catch(function (error) {
                            //console.log(error.response)
                            user  = error.response.data.errors.user != null ? error.response.data.errors.user+ '\n' : '';
                            username  = error.response.data.errors.username != null ? error.response.data.errors.username+ '\n' : '';
                            email  = error.response.data.errors.email != null ? error.response.data.errors.email+ '\n' : '';;
                            errorMessage.innerText =user　+　username +　email;
                        });

            }
        </script>

    </div>
</div>
</body>
</html>
