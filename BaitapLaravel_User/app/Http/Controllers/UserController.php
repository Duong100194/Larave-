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
use Illuminate\Validation\ValidationException;

use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        //$users= DB::table('users')->orderBy('id', 'desc')->paginate(15);
        $users = User::orderBy('id', 'desc')->paginate(15);
        return view('user-list-view', compact('users'));
    }

    public function create()
    {
        return view('user-insert-view');

    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'user' => 'required|max:50',
                'username' => 'required|max:50',
                'email' => 'required|email:rfc,dns',
                'address' => 'max:250',
            ]);
            $user = new User;
            $user->user = $request->user;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();
            return response()->json(['success' => 'User Created']);
        } catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }

    }

    public function edit($id)
    {
        return view('user-edit-view', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request)
    {
        try {
            $this->validate($request, [
                'user' => 'required|max:50',
                'username' => 'required|max:50',
                'email' => 'required|email:rfc,dns',
                'address' => 'max:250',
            ]);
            $user = User::find($request->id);
            $user->id = $request->id;
            $user->user = $request->user;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->update();
            return response()->json(['success' => 'User Updated']);
        }
        catch (ValidationException $exception) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Error',
                'errors' => $exception->errors(),
            ], 422);
        }
//        dd($request);
//        $user = User::find($id);
//        $user->id = $request->id;
//        $user->user = $request->user;
//        $user->username = $request->username;
//        $user->email = $request->email;
//        $user->address = $request->address;
//        $user->update();
//        return redirect()->route('show_list');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        #return redirect()->route('show_list');
        return response()->json(['success' => 'Deleted']);
    }
    public function searchByName(Request $request)
    {
        $user = User::where('user', 'like', '%' . $request->value . '%')->get();

        return response()->json($user);
    }

    public function searchByEmail(Request $request)
    {
        $user = User::where('email', 'like', '%' . $request->value . '%')->get();

        return response()->json($user);
    }
}


