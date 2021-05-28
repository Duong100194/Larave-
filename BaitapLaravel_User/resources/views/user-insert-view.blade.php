@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
            <form class="form-group "  method="POST" action="{{ route('store_user') }}">
                @csrf
                <h1>Add User</h1>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="c-section-box__head">
                            <div class="c-section-box__title">
                                User  <span class="error ">(必須)</span>
                            </div>
                        </div>
                        <div class="c-section-box__body">
                            <input type="text" class="form-control" name="user" id="user" onfocus="userInsert.clearError(this)">
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
                            <input type="text" class="form-control" name="username" id="username" onfocus="userInsert.clearError(this)">
                        </div>
                        <p class="error" style="display:none" id="error_username"></p>
                    </div>
                    <div class="form-group row">
                        <div class="c-section-box__head">
                            <div class="c-section-box__title">
                                Email  <span class="error">(必須)</span>
                            </div>
                        </div>
                        <div class="c-section-box__body">
                            <input type="text" class="form-control" placeholder="@Email.com" name="email" id="email" onfocus="userInsert.clearError(this)">
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
                            <input type="text"  class="form-control" name="address" id="address" onfocus="userInsert.clearError(this)">
                        </div>
                    </div>
                    <p class="error" style="display:none" id="error_address"> </p>
                    <div class="form-group row">
                        <button type="button" class="btn btn-info btn-lg" onclick="userInsert.insertUser()">Insert</button>
                        <a href="{{ route('show_list') }}" class="btn btn-default btn-lg">Cancel</a>
                    </div>
                </div>

            </form>
        <script type="text/javascript">
            "use strict";
            var userInsert = {
                /**
                 * Insert user
                 */
                insertUser: function() {
                    let user = document.getElementById('user').value;
                    let username = document.getElementById('username').value;
                    let email = document.getElementById('email').value;
                    let address = document.getElementById('address').value;
                    var submitData = {
                        user: user,
                        username:username,
                        email: email,
                        address: address,
                    }
                    axios.post('/Laravel_Pr/BaitapLaravel_User/public/store', submitData)
                        .then(function (response) {
                          alert(response.data.success);
                         window.location.href = "{{route('show_list')}}";
                        //  console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error.response.data.errors);
                            for ( let key in error.response.data.errors) {
                                //Sau khi e co bien key, e se search xem key do co ben trong errors hay ko.
                                console.log(error.response.data.errors.hasOwnProperty(key));
                                if (error.response.data.errors.hasOwnProperty(key)) {
                                    //Neu key do co ben trong errors. e se dua no vao doan text;
                                    //errorMessage.innertText += error.response.data.errors[key][0];// cach nay la dua ra toan bo text trong cung 1 cho
                                    $('#error_'+key).html(error.response.data.errors[key][0]);
                                    $('#error_'+key).css('display', 'block');
                                }
                            }
                         });
                },
                /**
                 * Clear reset error is click input
                 * @param self
                 */
                clearError: function(self) {
                    console.log($(self).attr('name'));//attribute
                    let txt_Click = $(self).attr('name');
                    $('#error_'+txt_Click).css('display', 'none');
                }

            }
        </script>
    </div>
</div>
@endsection
