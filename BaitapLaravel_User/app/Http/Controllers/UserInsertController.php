<?php
namespace App\Http\Controllers;
use App\StudInsert;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserInsertController extends Controller
{
    public function index()
    {
        return view('user-list-view');
    }
}


