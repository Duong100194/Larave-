<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Manager</title>
    {{--<style>
        span
        {
            color: rosybrown;
            display: inline-block;
            width: 100px;
            background-color: bisque;
            margin-bottom: 3px;
            margin-left: 3px;
            padding: 10px;

        }
        li
        {
            list-style:square;
        }


    </style>
    --}}
</head>
<body>

<div>
    <form method="GET" action="{{ route('create_user') }}" >
        <table border="1" style="">
        <h1>User List</h1>
        <input type = 'submit' value = "Add User"/>
        <br>
        <thead>
        <tr>
            <th>id</th>
            <th>User</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>

        </tr>
       </thead>
        <tbody>
            @foreach($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->user}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>
                <a class="btn btn-danger" href="">Del</a>
                <a href="" class="btn btn-primary">Edit</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    </form>

</div>

</body>
</html>
