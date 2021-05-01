<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //echo "test";
       //  return view('user-list-view');
       $users= DB::table('users')->get();
       return view('user-list-view', compact('users'));
        //viết thế này là Laravel tự động hiểu mình sẽ dùng biến $users trong
        // Controller và đặt tên cho biến trong Blade là users luôn.
    }
    public function destroy($id) {
        DB::delete('delete from users where id = ?',[$id]);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/delete-records">Click Here</a> to go back.';
    }

}


