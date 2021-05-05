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
        $users= DB::table('users')->paginate(15);
        return view('user-list-view', compact('users'));
    }
    public function create()
    {
       return view('user-insert-view');

    }
    public function destroy(Request $request,$id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('show_list')->with('message', '削除しました。');
    }
    public function store(StroreUserRequest $request)
    {
//        dd($request);
        $user=new User;
        $user->user=$request->user;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->save();

       return redirect()->route('show_list');
    }
    public function edit($id)
    {
       $user = User::find($id);
        return view('user-edit-view', ['user' => User::findOrFail($id)]);
    }
    public function update(StroreUserRequest $request,$id)
    {
        //dd($request);
        $user = User::find($id);
        $user->id=$request->id;
        $user->user=$request->user;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->update();
        return redirect()->route('show_list');
    }

}


