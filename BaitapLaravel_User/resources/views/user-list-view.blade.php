
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
            <div class="row" >
                <div class="col-sm-8"> <input id="header-search" type="text" name="search" class="form-control m-input" placeholder="Enter Country Name" onclick="search()" /></div>
                <div class="col-sm-4"> <button type="button" class="btn btn-default" id="btnSearch" onclick="country_name()">Search</button></div>
            </div>
            {{ csrf_field() }}
            <div>
            <div id="search-suggest" class="s-suggest"></div>
            </div>
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <div class="header-search">--}}
{{--                    <form method="POST" id="header-search">--}}
{{--                        <input type="text" name="search" class="form-control m-input" placeholder="Enter Country Name" />--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div id="search-suggest" class="s-suggest"></div>--}}
{{--            </div>--}}
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

                         function search()
                         {
                             if (confirm("Are you sure you want to delete this?"))
                             {
                                 $('#header-search').val();
                                 //axios.get('http://localhost/Laravel_Pr/BaitapLaravel_User/public/delete/' + id)
                                 axios.post('/Laravel_Pr/BaitapLaravel_User/public/search', {
                                     id: 1
                                 })
                                     .then(function (response) {
                                         console.log(response);
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
                                 // $.ajax({
                                 //     url: '/Laravel_Pr/BaitapLaravel_User/public/search',
                                 //     type: 'POST',
                                 //     data: search,
                                 // })
                                 //     .done(function(res) {
                                 //         console.log(res);
                                 //         $('#search-suggest').html('');
                                 //         $('#search-suggest').append(res)
                                 //     })
                                 {{--$.ajax({--}}
                                 {{--    url: '/Laravel_Pr/BaitapLaravel_User/public/search',--}}
                                 {{--    type: "POST",--}}

                                 {{--    data: {--}}
                                 {{--        "_token": "{{ csrf_token() }}",--}}
                                 {{--        id: search,--}}

                                 {{--    },--}}
                                 {{--    success: function (response) {--}}
                                 {{--        console.log(response);--}}
                                 {{--    },--}}
                                 {{--    error: function (error) {--}}
                                 {{--        console.log(error);--}}
                                 {{--    }--}}

                                 {{--});--}}

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
         </table>

    </form>

</div>

</body>
</html>
