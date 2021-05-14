@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="jumbotron text-center">User List</h1>
    <form action="{{route('show_list')}}" method='GET'>
        <div class="row">
            <div class="col-sm-3">
                <label>User:</label>
                <input type="search" id="searchUser" name="searchUser" class="form-control m-input" placeholder="Enter User"/>
            </div>
            <div class="col-sm-3">
                <label>UserName:</label>
                <input type="text" id="searchUsername" name="searchUsername" class="form-control m-input" placeholder="Enter UserName"/>
            </div>
            <div class="col-sm-3">
                <label>Email:</label>
                <input type="text" id="searchEmail" name="searchEmail" class="form-control m-input" placeholder="Enter Email"/>
            </div>
            <div class="col-sm-3">
                <label>Address:</label>
                <input type="text" id="searchAddress" name="searchAddress" class="form-control m-input" placeholder="Enter Address"/>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button  class="btn btn-primary">Search</button>
        </div>
    </form>

    <div>
        <a href="{{ route('create_user') }}" class="btn btn-danger">Add User</a>
    </div>
    <table border="1" class="jumbotron table table-striped" id="User_list">
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
                 @foreach($users as $item)
                    <tr>
                        <td class="text-center" id="id">{{$item->id}}</td>
                        <td class="text-center" id="user">{{$item->user}}</td>
                        <td class="text-center" id="username">{{$item->username}}</td>
                        <td class="text-center" id="email">{{$item->email}}</td>
                        <td class="text-center" id="address">{{$item->address}}</td>
                        <td class="text-center" colspan="">
                          <a class="btn btn-danger float-left" onclick="confirmDelete({{$item->id}})">Del</a>
                          <a href="{{ route('edit_user',$item->id) }}" class="btn btn-success float-left">Edit</a>
                        </td>
                    </tr>

                 @endforeach
                     <script>
                         "use strict";
                         function confirmDelete(id)
                         {
                             if (confirm("Are you sure you want to delete this?"))
                             {
                                 //axios.get('http://localhost/Laravel_Pr/BaitapLaravel_User/public/delete/' + id)
                                 axios.post('/Laravel_Pr/BaitapLaravel_User/public/delete', {
                                     id: id
                                 })
                                     .then(function (response) {
                                         window.location.reload();
                                     })
                                     .catch(function (error) {
                                         console.log(error.response);
                                     });
                             }
                             else
                                 return false;

                         }
                     </script>

            </tbody>
            {{$users->links()}}
         </table>
</div>
@endsection
