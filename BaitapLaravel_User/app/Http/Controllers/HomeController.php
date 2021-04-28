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
       // return view('user-list-view');
        $data= DB::table('users')->get();
        return view('user-list-view',['data'=>$data]);
    }

}


