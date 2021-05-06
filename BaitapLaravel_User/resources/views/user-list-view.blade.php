
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> User manager</title>
</head>
<body>

<div class="container">
    <form method="GET" action="{{ route('create_user') }}" >
        <table border="1" class="table table-striped">
             <h1>User List</h1>
            <div>
                <input type = 'submit' class="btn btn-warning" value = "Add User"/>
            </div>
             <thead>
                <tr>
                     <th class="text-center" >id</th>
                     <th class="text-center">User</th>
                     <th class="text-center">User Name</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Address</th>
                     <th class="text-center">Actions</th>

                 </tr>
              </thead>
            <tbody>
            {{$users->links()}}
                 @foreach($users as $item)

                    <tr>
                        <td class="text-center">{{$item->id}}</td>
                        <td class="text-center">{{$item->user}}</td>
                        <td class="text-center">{{$item->username}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td class="text-center">{{$item->address}}</td>
                        <td class="text-center" colspan="">
                          <a href="{{ route('delete_user',$item->id,'method=GET') }}" class="btn btn-danger float-left" onclick="return confirm('Are you sure?')">Del</a>
                          <a href="{{ route('edit_user',$item->id,'method=GET') }}" class="btn btn-success float-left">Edit</a>
                    </tr>
                 @endforeach
            </tbody>
         </table>

    </form>

</div>

</body>
</html>
