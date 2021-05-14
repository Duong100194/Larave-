@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <form action='{{route('update_user', $user->id)}}' method='POST'>
            {{ csrf_field() }}
            <div class="form-group row">
            <h1>Edit User</h1>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        User  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='user' id="user" value="{{$user->user}}" onfocus="clearError(this)">
                </div>
                <p class="error" style="display:none" id="error_user"> </p>
            </div>

            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        UserName  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='username' id="username" value="{{$user->username}}" onfocus="clearError(this)">
                </div>
                <p class="error" style="display:none" id="error_username"> </p>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Email  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control"  placeholder="@Email.com" name='email' id="email" value="{{$user->email}}" onfocus="clearError(this)">
                </div>
                <p class="error" style="display:none" id="error_email"> </p>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Address
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='address' id="address" value="{{$user->address}}" onfocus="clearError(this)">
                </div>
                <p class="error" style="display:none" id="error_address"> </p>
            </div>
            <div class="form-group row">
            <button type="button" class="btn btn-info btn-lg" onclick="UpdateUser({{$user->id}})">Update</button>
                <a href="{{route('show_list')}}" class="btn btn-default btn-lg">Cancel</a>
            </div>
        </form>

        <script type="text/javascript">
            "use strict";

            /**
             * update users with id
             * @param id
             * @constructor
             */
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
                //Send a POST request to /edit with an object of submitdata
                axios.post('/Laravel_Pr/BaitapLaravel_User/public/edit', submitData)
                    .then(function (response) {
                        alert(response.data.success);
                        window.location.href ="{{route('show_list')}}";
                        //  console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error.response.data.errors);
                        for (let key in error.response.data.errors) {
                            //Sau khi e co bien key, e se search xem key do co ben trong errors hay ko.
                            console.log(error.response.data.errors.hasOwnProperty(key));
                            //Confirm key in error is exits
                            if (error.response.data.errors.hasOwnProperty(key)) {
                                //Neu key do co ben trong errors. e se dua no vao doan text;
                                //errorMessage.innertText += error.response.data.errors[key][0];// cach nay la dua ra toan bo text trong cung 1 cho
                                $('#error_' + key).html(error.response.data.errors[key][0]);
                                $('#error_' + key).css('display', 'block');
                            }
                        }
                    });
            }

            /**
             * Clear reset error is click input
             * @param self
             */
            function clearError(self) {
                console.log($(self).attr('name'));//attribute
                let txt_Click = $(self).attr('name');
                $('#error_'+txt_Click).css('display', 'none');
            }

        </script>
    </div>
</div>
@endsection
