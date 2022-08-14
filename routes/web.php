<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testing\Route AS RoutingController;
use Illuminate\Http\Request;

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

Route::get('/firstTest', function() {
    return "hello this is first route";
});

Route::get('/controllerRoute', [RoutingController::class, 'printMessage']);

Route::get('/home', function() {
    return view('RouteTesting/ExampleRoute');
});

Route::post('/getRequest', function(Request $request) {
    return $input = $request->all();
});

//Route::redirect('/redirectTest', '/home', 301);

//default Status 301
Route::permanentRedirect('/redirectTest', '/home');

//dobut
Route::view('/home1/name', 'RouteTesting/ExampleRoute', ['name' => 'Thinu']);

Route::get('/parameterRoute/{id}', function ($id) {
    return $id;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return "post ID ".$postId." comment ID ".$commentId;
});

// Route::get('/user/{id}', function (Request $request, $id) {
//     return 'User '.$id;
// });

Route::get('/myName/{name?}', function ($name = 'thinu') {
    return $name;
});

Route::get('whereParameters/{name}/secondPara/{id}', function ($name, $id) {
    return "name is : " .$name. " Id is : ".$id;
})->where(['name' => '[A-Za-z]+','id' => '[0-9]+']);

// Global Constraints use in App/RouteServiceProvider.php

// error Method Illuminate\Routing\Route::whereIn does not exist.
    // Route::get('/names/{collection?}', function ($collection = '') {
    //     return $collection;
    // })->whereIn('collection', ['roy','hii','bye']);

Route::get('/search/{search}', function ($search) {
    return $search;
})->where('search', '.*');

//dabut
    // Route::get('/user/profile', function () {
    //     //
    // })->name('profile');

    // Route::get(
    //     '/user/profile',
    //     [RoutingController::class, 'printMessage']
    // )->name('profile');

    // // Generating URLs...
    // $url = route('profile');

    // // Generating Redirects...
    // return redirect()->route('profile');

// middele ware Route dobut

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "this is user Page";
    });

    Route::get('/staff', function () {
        return "this is staff page";
    });
});

Route::get('/sanja', function () {
    return 'sanja';
});