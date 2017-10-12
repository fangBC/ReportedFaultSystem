<?php

/*
|--------------------------------------------------------------------------
| Canvas Application Routes : Frontend
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'home', 'namespace' => 'Frontend', 'middleware' => 'auth'], function () {
    Route::get('/',  'HomeController@index')->name('home');
    Route::get('/schedule', 'ScheduleController@index');
    Route::post('/create', 'HomeController@store')->name('hitch/create');
    Route::get('/cancel', 'HomeController@cancel')->name('home/cancel');
    Route::get('search', 'SearchController@index');
    Route::get('type/ajax', 'HomeController@getDetailed')->name('type/ajax');
    Route::get('/binding', 'HomeController@binding')->name('binding');
    Route::post('binding_submit', 'HomeController@setFloor')->name('setFloor');
});
/*
|--------------------------------------------------------------------------
| Canvas Application Routes : Backend
|--------------------------------------------------------------------------
*/

Route::group([
    'namespace'  => 'Backend',
    'middleware' => 'auth',
    'middleware' => 'checkIfAdmin'
], function () {
    Route::get('/admin/index', 'HomeController@index')->name('admin');
    Route::group(['prefix' => 'admin'], function(){
        Route::get('accepted', 'AcceptedController@index');
        Route::get('statistics', 'StatisticsController@index');
        Route::get('register', 'RegisterController@index');
        Route::post('register_user', 'RegisterController@create')->name('admin/register');
        Route::any('post', 'PostController@update')->name('admin/post');
        Route::any('cancel', 'AcceptedController@cancel')->name('admin/cancel');
        Route::get('accepted/finish', 'AcceptedController@finish')->name('accept/finish');
        Route::get('details/{id}', 'HomeController@details')->name('details');
        Route::get('statistics/select', 'StatisticsController@selectName');
        Route::get('repository','RepositoryController@show');
        Route::get('repository/ajax', 'RepositoryController@ajax');
        Route::get('repository/ajax/deleted', 'RepositoryController@deleted');
        Route::get('repository/add',function(){
            $data = \App\Models\Hitch_Type::all();
            return view('backend.repository.add.add', compact('data'));
        });
        Route::post('repository/post', 'RepositoryController@store');
        Route::get('change/floor', 'HomeController@floorView');
        Route::post('change/floor_info', 'HomeController@changeFloor')->name('changeFloor');
        Route::post('feedback','AcceptedController@feedBack')->name('feedback');
    });




    \TalvBansal\MediaManager\Routes\MediaRoutes::get();

    Route::get('admin/profile/privacy', 'ProfileController@editPrivacy')->name('admin.profile.privacy');
    Route::resource('admin/profile', 'ProfileController', [
        'only' => ['index', 'update'],
        'names' => [
            'index' => 'admin.profile.index',
            'update' => 'admin.profile.update',
        ],
    ]);

    Route::resource('admin/search', 'SearchController', [
        'only' => ['index'],
        'names' => [
            'index' => 'admin.search.index',
        ],
    ]);
});

/*
|--------------------------------------------------------------------------
| Canvas Application Routes : Authentication
|--------------------------------------------------------------------------
*/
Route::group([
    'namespace' => 'Auth',
], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'LoginController@login')->name('auth.login.store');
        Route::get('logout', 'LoginController@logout')->name('auth.logout');
        Route::get('password', 'PasswordController@updatePassword')->name('auth/password');
    });

    Route::group(['prefix' => 'password'], function () {
        Route::get('forgot', 'ForgotPasswordController@showLinkRequestForm')->name('auth.password.forgot');
        Route::post('forgot', 'ForgotPasswordController@sendResetLinkEmail')->name('auth.password.forgot.store');
        Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('auth.password.reset');
        Route::post('reset', 'ResetPasswordController@reset')->name('auth.password.reset.store');
    });
});
Route::get('create',function(){
    return view('backend.help.index');
});
