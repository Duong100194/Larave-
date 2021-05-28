@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="jumbotron text-center">User List</h1>
    <form action="{{route('show_list')}}" method='GET'>
    @csrf
        <div class="row">
            <div class="col-sm-3">
                <label>User:</label>
                <input type="search" id="searchUser" name="searchUser" class="form-control m-input" value="{{isset($request_post['searchUser'])?$request_post['searchUser']:''}}" placeholder="EnterUser"/>
            </div>
            <div class="col-sm-3">
                <label>UserName:</label>
                <input type="text" id="searchUsername" name="searchUsername" class="form-control m-input" placeholder="Enter UserName" value="{{isset($request_post['searchUsername'])?$request_post['searchUsername']:''}}"/>
            </div>
            <div class="col-sm-3">
                <label>Email:</label>
                <input type="text" id="searchEmail" name="searchEmail" class="form-control m-input" placeholder="Enter Email" value="{{isset($request_post['searchEmail'])?$request_post['searchEmail']:''}}"/>
            </div>
            <div class="col-sm-3">
                <label>Address:</label>
                <input type="text" id="searchAddress" name="searchAddress" class="form-control m-input" placeholder="Enter Address" value="{{isset($request_post['searchAddress'])?$request_post['searchAddress']:''}}"/>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button  class="btn btn-primary">Search</button>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12"><p class="pull-left">{{ $users->total() }}件/</p>
        <p class="pull-left">{{ $users->firstItem() }}件〜 {{ $users->lastItem() }} 件表示</p></div>
    </div>
    <div>
        <!-- <a href="{{ route('create_user') }}" class="btn btn-danger">Add User</a> -->
        <button type="button" id="insert-btn" class="btn btn-danger" data-toggle="modal" data-target="#myModal" >Add User</button>
    </div>
    <table class="table table-bordered table-hover" id="User_list">
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
                          <!-- <a href="{{ route('edit_user',$item->id) }}" class="btn btn-success float-left">Edit</a> -->
                          <button data-toggle="modal" data-target="#myModal"
                          class="btn btn-success float-left">Edit</button>
                          <!-- <button type="button" id="edit-btn" class="btn btn-success float-left" data-toggle="modal" data-target="#myModal" value="{{$item->id}}">Edit</button> -->
                        </td>
                    </tr>
                 @endforeach
                 </tbody>
                <!-- {{$users->links()}} -->
              {{ $users->appends(request()->query())->links() }}
    </table>
    <!-- Modal HTML -->
    <!-- Modal -->
    @include('user-modal-view') 
    <script>
        "use strict";
        /**
        * confirm before delete
        * @param id
        * @returns {boolean}
        */
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
        function insertUser()
        {
            let id = $('#user_id').val();
            let user = $("#myModal").find('input[name="user"]').val();
            let username = $("#myModal").find('input[name="username"]').val();
            let email = $("#myModal").find('input[name="email"]').val();
            let address = $("#myModal").find('input[name="address"]').val();
            var submitData = {
                user: user,
                username:username,
                email: email,
                address: address,
            }
           // console.log(submitData);
            axios.post('/store', submitData)
                .then(function (response) {
                    alert(response.data.success);
                    window.location.href = "{{route('show_list')}}";
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
        }
        function UpdateUser(id)
             {
                let user = $("#myModal").find('input[name="user"]').val();
                let username = $("#myModal").find('input[name="username"]').val();
                let email = $("#myModal").find('input[name="email"]').val();
                let address = $("#myModal").find('input[name="address"]').val();
                var submitData = {
                user: user,
                username:username,
                email: email,
                address: address,
            }
                //Send a POST request to /edit with an object of submitdata
                axios.post('/edit', submitData)
                    .then(function (response)
                    {
                        alert(response.data.success);
                        window.location.href ="{{route('show_list')}}";
                        //  console.log(response);
                    })
                    .catch(function (error)
                    {
                        console.log(error.response.data.errors);
                        for (let key in error.response.data.errors)
                        {
                            //Sau khi e co bien key, e se search xem key do co ben trong errors hay ko.
                            console.log(error.response.data.errors.hasOwnProperty(key));
                            //Confirm key in error is exits
                            if (error.response.data.errors.hasOwnProperty(key))
                            {
                                //Neu key do co ben trong errors. e se dua no vao doan text;
                                //errorMessage.innertText += error.response.data.errors[key][0];// cach nay la dua ra toan bo text trong cung 1 cho
                                $('#error_' + key).html(error.response.data.errors[key][0]);
                                $('#error_' + key).css('display', 'block');
                            }
                        }
                    });
             }
        function clearError(self) {
            console.log($(self).attr('name'));//attribute
            let txt_Click = $(self).attr('name');
            $('#error_'+txt_Click).css('display', 'none');
        }
       function clearModalInput()
        {
        $("#myModal").on("hidden.bs.modal",function()
        {
            $('#myModal').find(':input').val('');
        });
        }
       clearModalInput();
    </script>
</div>
@endsection
