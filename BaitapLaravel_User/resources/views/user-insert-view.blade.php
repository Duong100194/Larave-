<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
{{--    <script src="vue.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
{{--    <link rel="stylesheet" href="vue.css">--}}

    <style>
        .error {color: #FF0000;}
    </style>
    <title> Add user</title>
</head>
<body>
<div class="container">
    <div class="row">
            <form class="form-group"  method="POST" action="{{ route('store_user') }}">
                @csrf
                <div class="form-group row">
                <h1>Add User</h1>

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
                </div>
                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            User  <span class="error">(必須)</span>
                        </div>

                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" name='user'>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            UserName  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control" name='username'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            Email  <span class="error">(必須)</span>
                        </div>
                    </div>
                    <div class="c-section-box__body">
                        <input type="text" class="form-control"  placeholder="@Email.com" name='email'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="c-section-box__head">
                        <div class="c-section-box__title">
                            Address
                        </div>

                    </div>
                    <div class="c-section-box__body">
                        <input type="text"  class="form-control" name='address'>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="button" class="btn btn-info btn-lg" onclick="userInsert.insertUser()">Save</button>
                    <a href="{{ route('show_list') }}" class="btn btn-default btn-lg">Cancel</a>
                </div>
            </form>

        <script type="text/javascript">
            "use strict";
            var userInsert = {
                insertUser: function() {
                    var submitData = {
                        user: '',
                        username: '',
                        email: '',
                        address: ''
                    }
                    axios.post('/Laravel_Pr/BaitapLaravel_User/public/store', submitData)
                        .then(function () {
                            //window.location.reload();
                            //console.log(response);
                            dd(submitData)
                        })
                        .catch(function (error) {
                            console.log(error.response)
                        });
                }
            }
        </script>
    </div>
</div>
</body>
</html>
