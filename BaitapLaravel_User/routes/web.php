<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/list', [\App\Http\Controllers\UserController::class, 'index'])->name('show_list');
Route::get('/create_user', [\App\Http\Controllers\UserController::class, 'create'])->name('create_user');
Route::post('/store', [\App\Http\Controllers\UserController::class, 'store'])->name('store_user');
Route::get('/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::post('/edit', [\App\Http\Controllers\UserController::class, 'update'])->name('update_user');
Route::post('/delete', [\App\Http\Controllers\UserController::class, 'destroy'])->name('delete_user');
Route::get('/search', [\App\Http\Controllers\UserController::class, 'search'])->name('search');
//Route::post('/search', 'HomeController@searchdata')->name('searchdata');
//Route::post('/search', [\App\Http\Controllers\UserController::class, 'searchFullText'])->name('searchdata');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/test-cau-1', function() {
//    dd();
//});//callback()

Route::get('/test-cau-1', function()
{
    $array = [
    'DUONG',
	'TU',
	'HA',
	'TUYEN',
	'LUC',
	'HON',
	'DUY'];
    //add value to array
    array_push($array, "中村", "中島");
    dd($array);
});//callback()
Route::get('/test-cau-2', function()
{
    $array = [
        'DUONG',
        'TU',
        'HA',
        'TUYEN',
        'LUC',
        'HON',
        'DUY'];
    //sap xep mang theo thu tu tang dan
    //Hàm rsort()->giam dan
    sort($array);
    foreach ($array as $key)
    {
        echo "$key </br>";
    }
});
Route::get('/test-cau-3', function()
{
    $array = [
        'DUONG',
        'TU',
        'HA',
        'TUYEN',
        'LUC',
        'HON',
        'DUY'
    ];
   //trả về một mảng mới đã được đảo ngược KEY và VALUE
    dd(array_flip($array));
});
Route::get('/test-cau-4', function()
{
    $array = [
        'DUONG',
        'TU',
        'HA',
        'TUYEN',
        'LUC',
        'HON',
        'DUY'
    ];
    //filter gia tri trong mang
    dd(array_filter($array,function ($value)
    {
        return $value === 'TU';
    }
    ));
});
Route::get('/test-cau-5', function()
{
    $array= [
        1 => 'DUONG',
        2 => 'TU',
        3 => 'HA',
        4 => 'TUYEN',
        5 => 'LUC',
        6 => 'HON',
        7 => 'DUY'
    ];
    $array2=[];

    foreach ($array as $key => $value )
    {
        if ($value == "DUONG")
        {
            $array2[$key] = "$value THI DEP GAI";
            //array_push($array2, "$value THI DEP GAI");
        }
        else
        {
            $array2[$key] = "$value THI DEP TRAI";
        }
    }
    dd($array2);

});
Route::get('/baitap11', function () {
    $array = [
        'web' => ['html', 'css', 'bootstrap'],
        'p_lang' => ['php', 'python', 'cabbage'],
        'framework' => ['laravel', 'codeigniter']
    ];

    $array1['test'] = array('laravel', 'codeigniter');

//before adding new values
//add elements/values in array
    array_push($array['framework'], $array1);
    dd($array);

//after adding a new values



});


//2021/05/19
Route::get('/baitap6', function ()
{
    $array = [
        'tu'   => [
            'job' => 'programmer',
            'hobby' => 'football',
            'action' => 'study'
        ],
        'luc'  => [
            'job' => 'se',
            'hobby' => 'grow trees',
            'action' => 'learn japanese'
        ],
        'duong'    => [
            'job' => 'tester',
            'hobby' => 'unknown',
            'action' => 'programming'
        ],
        'ha'   => [
            'job' => 'infructure',
            'hobby' => 'music',
            'action' => 'building server'
        ]
    ];
    $array2 = [
        'ABC'   => [
            'job' => 'programmer',
            'hobby' => 'football',
            'action' => 'study'
        ]];
    array_push($array, $array2);
  dd($array);
});
Route::get('/baitap7', function () {
    $array = [
        'tu' => [
            'job' => 'programmer',
            'hobby' => 'football',
            'action' => 'study'
        ],
        'luc' => [
            'job' => 'se',
            'hobby' => 'grow trees',
            'action' => 'learn japanese'
        ],
        'duong' => [
            'job' => 'tester',
            'hobby' => 'unknown',
            'action' => 'programming'
        ],
        'ha' => [
            'job' => 'infructure',
            'hobby' => 'music',
            'action' => 'building server'
        ]
    ];
    dd(array_filter($array, function ($value)
    {
        return ($value["job"] != "programmer");
    }));
});
Route::get('/baitap8', function () {
    $collection = collect([
        'tu' => [
            'job' => 'programmer',
            'hobby' => 'football',
            'action' => 'study'
        ],
        'luc' => [
            'job' => 'se',
            'hobby' => 'grow trees',
            'action' => 'learn japanese'
        ],
        'duong' => [
            'job' => 'tester',
            'hobby' => 'unknown',
            'action' => 'programming'
        ],
        'ha' => [
            'job' => 'infructure',
            'hobby' => 'music',
            'action' => 'building server'
        ]

    ]);
    $datas = $collection->map(function ($item, $key) {
        if($key == "duong")
        {
            $item['gender'] = "female";
        }
        else
        {
            $item['gender'] = "male";
        }
        return $item;
    });

    dd($datas);
    //print_r($datas);

});
Route::get('/baitap9', function () {
    $collection = collect([
        'tu' => [
            'job' => 'programmer',
            'hobby' => 'football',
            'action' => 'study'
        ],
        'luc' => [
            'job' => 'se',
            'hobby' => 'grow trees',
            'action' => 'learn japanese'
        ],
        'duong' => [
            'job' => 'tester',
            'hobby' => 'unknown',
            'action' => 'programming'
        ],
        'ha' => [
            'job' => 'infructure',
            'hobby' => 'music',
            'action' => 'building server'
        ]

    ]);

    $datas = $collection->map(function ($item, $key) {
        $item['job'] = $key . ' la ' . $item['job'];
        $item['hobby'] = $key . ' thich ' . $item['hobby'];
        $item['action'] = $key . ' hay ' . $item['action'];
        return $item;
    });
    dd($datas);
});


