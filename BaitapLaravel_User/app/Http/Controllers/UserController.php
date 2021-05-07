<?php
namespace App\Http\Controllers;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        //$users= DB::table('users')->orderBy('id', 'desc')->paginate(15);
        $users = User::orderBy('id','desc')->paginate(15);
        return view('user-list-view', compact('users'));
    }
    public function create()
    {
       return view('user-insert-view');

    }

    public function store(CreateUserRequest $request)
    {
       // dd($request->all());
        $user = new User;
        $user->user = $request->user;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
        return response()->json(['success' => 'Deleted']);
    }
    public function edit($id)
    {
        return view('user-edit-view', ['user' => User::findOrFail($id)]);
    }
    public function update(CreateUserRequest $request, $id)
    {
//        dd($request);
        $user = User::find($id);
        $user->id = $request->id;
        $user->user = $request->user;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->update();
        return redirect()->route('show_list');
    }
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        #return redirect()->route('show_list');
        return response()->json(['success' => 'Deleted']);
    }
}


