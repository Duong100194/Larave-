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

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $request_post = request()->all();
      // dd($request_post);
        $search_user = request('searchUser');
        $search_username=request('searchUsername');
        $search_email=request('searchEmail');
        $search_address=request('searchAddress');
        $query = User::latest();
        if(! empty($search_user)) {
            $query->Where("user", "LIKE", "%{$search_user}%");
        }
        if(! empty($search_username)) {
            $query->Where("username", "LIKE", "%{$search_username}%");
        }
        if(! empty($search_email)) {
            $query->Where("email", "LIKE", "%{$search_email}%");
        }
        if(! empty($search_address)) {
            $query->Where("address", "LIKE", "%{$search_address}%");
        }
        $users = $query->orderBy('id', 'desc')->paginate(15);
        return view('user-list-view', ['users' =>$users,'request_post' =>$request_post]);
    }

    public function create()
    {
        return view('user-insert-view');

    }

    public function store(UserRequest $request)
    {

        DB::transaction(function () use ($request)
        {
            $user = new User;
            $user->user = $request->user;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();

        });
        return response()->json(['success' => 'User Created']);
    }

    public function edit($id)
    {
        return view('user-edit-view', ['user' => User::findOrFail($id)]);
    }

    public function update(UserRequest $request)
    {
            DB::transaction(function () use ($request)
            {
                    $user = User::find($request->id);
                    $user->id = $request->id;
                    $user->user = $request->user;
                    $user->username = $request->username;
                    $user->email = $request->email;
                    $user->address = $request->address;
                    $user->update();

            });
        return response()->json(['success' => 'User Updated']);
    }
//    public function search(Request $request)
//    {
//        dd($request);
//            // $data = User::FullTextSearch('user', $request->keyword)->get();
//            //$data = User::search($request->keyword)->get();
//            $user = User::select("user", "username", "email", "address")
//                ->Where("user", "LIKE", "%{$request->user}%")
//                ->where("username", "LIKE", "%{$request->username}%")
//                ->Where("email", "LIKE", "%{$request->email}%")
//                ->Where("address", "LIKE", "%{$request->address}%")
//                ->get();
//        return $user;
//
//    }
    public function destroy(Request $request)
    {
        DB::transaction(function () use ($request)
        {
            $user = User::find($request->id);
            $user->delete();
            #return redirect()->route('show_list');

        });
        return response()->json(['success' => 'Deleted']);
    }

}


