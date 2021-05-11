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
    <title> Add user</title>
</head>
<body>
<div class="container">
    <div class="row">
            <form class="form-group "  method="POST" action="{{ route('store_user') }}">
                @csrf
                <h1>Add User</h1>
                <div class="card-body">
{{--                    <validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>--}}
{{--                    @error('user')--}}
{{--                    <div class="alert alert-danger" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                    @enderror--}}
{{--                    @error('username')--}}
{{--                    <div class="alert alert-danger" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                    @enderror--}}
{{--                    @error('email')--}}
{{--                    <div class="alert alert-danger" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                    @enderror--}}
{{--                    @error('address')--}}
{{--                    <div class="alert alert-danger" role="alert">--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    <strong>{{}}</strong>--}}
{{--                </div>--}}
                <div class="form-group row">
                    <p class="error" id ="errorMessage" > </p>
{{--                    <p class="error" id ="username" > </p>--}}
{{--                    <p class="error" id ="email" > </p>--}}
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            User  <span class="error ">(必須)</span>
                        </div>

                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" name="user" id="user">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            UserName  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            Email  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control"  placeholder="@Email.com" name="email" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            Address
                        </div>

                    </div>
                    <div class="c-section-box__body">
                        <input type="text"  class="form-control" name="address" id="address">
                    </div>
                </div>
                <div class="form-group row">
                    <button type="button" class="btn btn-info btn-lg" onclick="userInsert.insertUser()">Insert</button>
                    <a href="{{ route('show_list') }}" class="btn btn-default btn-lg">Cancel</a>
                </div>
            </form>
        <script type="text/javascript">
            "use strict";
            var userInsert = {
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
                    var errorMessage = document.getElementById("errorMessage");
                    axios.post('/Laravel_Pr/BaitapLaravel_User/public/store', submitData)
                        .then(function (response) {
                          alert(response.data.success);
                         window.location.href = "{{route('show_list')}}";
                        //  console.log(response);
                        })
                        .catch(function (error) {
                            //console.log(error.response)
                            // user  = error.response.data.errors.user != null ? error.response.data.errors.user+ '\n' : '';
                            // username  = error.response.data.errors.username != null ? error.response.data.errors.username+ '\n' : '';
                            // email  = error.response.data.errors.email != null ? error.response.data.errors.email+ '\n' : '';;
                            // errorMessage.innerText =user　+　username +　email;
                            // for ( let key in error.response.data.errors) {
                            //     //Sau khi e co bien key, e se search xem key do co ben trong errors hay ko.
                            //     if(error.response.data.errors.hasOwnProperty(key)) {
                            //         //Neu key do co ben trong errors. e se dua no vao doan text;
                            //         //Tên ban đầu của em là errormessage, không đặt như vậy. Đặt là errorMessages em nhé.
                            //         errorMessage.innertText += error.response.data.errors[key][0];// cach nay la dua ra toan bo text trong cung 1 cho
                            //
                            //         //Hoac, em co the dat cho no tung dong span text error roi id cho no ben duoi cac input field
                            //         //Sau khi check ra loi, e add key do vao jquery selector. Roi dua no ra.
                            //         //Bi quyet la em hay dat ten ID cua tag error do trung voi key cua error
                            //     }

                           // }
                            let er = error.response.data.errors;
                            let ov = Object.values(er);
                            errorMessage.innerText=ov.join('\n');

                        });

                }
            }
        </script>
    </div>
</div>
</body>
</html>
