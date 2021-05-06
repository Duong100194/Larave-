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
    <title> Add user</title>
</head>
<body>
<div class="container">
    <div class="row">
            <form form method="GET" action="{{ route('store_user') }}" class="form-group">
                @csrf
                <div class="form-group row">
                <h1>Add User</h1>

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
                    @error('address')
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
                        <input type="text"  class="form-control" name='address' >
                    </div>
                </div>
                <div class="form-group row">
                    <input type = 'submit'class="btn btn-info btn-lg" value = "insert"/>
                    <button class="btn btn-default btn-lg" formaction="{{ route('show_list') }}">Cancel</button>
                </div>
            </form>
    </div>
</div>
</body>
</html>
