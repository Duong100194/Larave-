<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <title> Add user</title>
</head>
<body>
<form method="GET" action="{{ route('store_user') }}">
    @csrf
    <table>
        <h1>Add User</h1>
        <td>ID<span class="error">(必須)</span></td>
        <tr>
            <td><input type="text" name='id'/></td>
            <div>
            @error('id')
                <span class="error"role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </tr>
        <td>User<span class="error">(必須)</span></td>
        <tr>
           <td><input type="text" name='user'/></td>
            <div>
            @error('user')
                <span class="error"role="alert">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </tr>
        <tr>
            <td>UserName<span class="error">(必須)</span></td>
        </tr>
            <td><input type="text" name='username'/></td>
        <div>
            @error('username')
            <span class="error"role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <tr>
            <td>Email<span class="error">(必須)</span></tr></td>
        </tr>
            <td><input type="text" name='email'/></td>
        <div>
            @error('email')
                <span class="error"role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <tr>
            <td>Address</td>
        </tr>
            <td><input type="text" name='address'/></td>
        </tr>

        <tr>
            <td colspan = '1'>
              <input type = 'submit' value = "insert"/>
             <input type = 'submit' value = "Cancel"/>
            </td>
        </tr>
</table>
</form>
</body>
</html>
