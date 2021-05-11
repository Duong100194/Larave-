@extends('layouts.layout')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('create_user') }}" >
        <table border="1" class="table table-striped" id="User_list">
             <h1>User List</h1>
            <div>
                <input type = 'submit' class="btn btn-warning" value = "Add User"/>
            </div>
             <thead>
            <div class="row" >
                <div class="col-sm-8"> <input id="header-search" type="text" name="search" class="form-control m-input" placeholder="Enter Your Search" onclick="search()" /></div>
                <div class="col-sm-4"> <button type="button" class="btn btn-default" id="btnSearch">Search</button></div>
            </div>
            {{ csrf_field() }}
            <div>
            <div id="search-suggest" class="s-suggest"></div>
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
                         $('#header-search').on('keyup', function() {
                             var search = this.value;
                            // console.log(1);
                             if ($(this).find('.m-input').val() == '') {
                                 $('#search-suggest div').hide();
                             } else {
                                 console.log(search)
                                 axios.post('/Laravel_Pr/BaitapLaravel_User/public/search', {
                                     keyword: search
                                 })
                                     .then(function (response) {
                                         console.log(response);
                                        // $('#search-suggest').html('');
                                        // $('#search-suggest').append(response)
                                     })
                                     .catch(function (error) {
                                         console.log(error);
                                     });
                             };
                         });
                     </script>

            </tbody>
            {{$users->links()}}
         </table>
    </form>
</div>
@endsection
