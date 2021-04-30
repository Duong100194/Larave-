<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StroreUserRequest;

class HomeController extends Controller
{
    public function index()
    {
        $users= DB::table('users')->get();
        return view('user-list-view', compact('users'));
        //viết thế này là Laravel tự động hiểu mình sẽ dùng biến $users trong
        // Controller và đặt tên cho biến trong Blade là users luôn.
        //compact:tao ra mang
        //with
    }
    public function create()
    {
       return view('create-user.user-insert-view');

    }
    public function destroy($id)
    {
        DB::delete('delete from users where id=?',[$id]);
        return redirect('show_list')->with('delete','User deleted successfully.');
    }
    public function store(StroreUserRequest $request)
    {
//        dd($request);
        $user=new User;
        $user->id=$request->id;
        $user->user=$request->user;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->save();

       return redirect()->route('show_list');
    }
    public function edit(Request $request)
    {
        $users= DB::table('users')->find($request->id);
        return view('user-edit-view', compact('user'));

    }
    public function update(Request $request)
    {
        $user = User::find($request->id);;
        $user->id=$request->id;
        $user->user=$request->user;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->save();
        return redirect()->route('show_list');
    }

}


