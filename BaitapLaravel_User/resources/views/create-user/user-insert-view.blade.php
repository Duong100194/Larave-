<!DOCTYPE html>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
    <title> Add user</title>
</head>
<body>
<form method="POST" action="{{ route('show_list') }}">
    @csrf
    <table>
        <h1>Add User</h1>
        <td>User
            <span class="error">必須</span></tr>
        </td>
        </tr>
        <td><input type="text" name='user'/>
  </td>
  </tr>
  <tr>
      <td>UserName
          <span class="error">必須</span></tr>
      </td>
  </tr>
  <td><input type="text" name='user_name'/>
  </td>

  <tr>
      <td>Email
          <span class="error">必須</span></tr>
      </td>
  </tr>
  <td><input type="text" name='email'/></td>
  </tr>
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
