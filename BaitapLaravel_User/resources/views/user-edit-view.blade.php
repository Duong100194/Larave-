<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .error {color: #FF0000;}
    </style>
    <title> Edit User </title>
</head>
<body>
<div class="container">
    <div class="row">
        <form action='{{ route('update_user',$user->id) }}' method='POST'>
            {{ csrf_field() }}
            <div class="form-group row">
            <h1>Edit User</h1>
            @error('user')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('username')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            @error('email')
            <div class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        User  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='user' value="{{ $user->user }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        UserName  <span class="error">(必須)</span>
                    </div>

                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control" name='username'value="{{ $user->username }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Email  <span class="error">(必須)</span>
                    </div>
                </div>
                <div class="c-section-box__body">
                    <input type="text" class="form-control"  placeholder="@Email.com" name='email'value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-group row">
                <div class="c-section-box__head">
                    <div class="c-section-box__title">
                        Address
                    </div>

                </div>
                <div class="c-section-box__body">
                    <input type="text"  class="form-control" name='address' value="{{ $user->address }}">
                </div>
            </div>
            <div class="form-group row">
                <input type = 'submit' class="btn btn-info btn-lg"  value = "Save"/>
                <a href="{{ route('show_list','method=GET') }}" class="btn btn-default btn-lg">Cancel</a>
            </div>
        </form>
    </div>
</div>
</form>
</body>
</html>
