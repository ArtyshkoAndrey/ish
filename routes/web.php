<?php


// User Routes
Route::group(['namespace' => 'User'],function(){
	Route::get('/','HomeController@index')->name('index');
	Route::get('/news', 'HomeController@news')->name('news');
	Route::get('post/{slug}','PostController@post')->name('post');

	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');
	Route::post('news/search', 'HomeController@search')->name('search');
    Route::get('news/search', 'HomeController@search')->name('search');
});

//Admin Routes
Route::group(['namespace' => 'Admin'],function(){
	Route::get('admin/home','HomeController@index')->name('admin.home');

	// Users Routes
	Route::resource('admin/user','UserController');
	// Roles Routes
	Route::resource('admin/role','RoleController');
	// Permission Routes
	Route::resource('admin/permission','PermissionController');
	// Post Routes
	Route::resource('admin/post','PostController');
	// Tag Routes
	Route::resource('admin/tag','TagController');
	// Category Routes
	Route::resource('admin/category','CategoryController');
	// Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('admin-login', 'Auth\LoginController@login');
    //Header
	Route::resource('admin/header', 'HeaderController');
    //Sitemap
    Route::get('/sitemap', 'SitemapController@index')->name('sitemap');
    //Courses Routes
    Route::resource('admin/course', 'CourseController');
    //Plan Routes
    Route::resource('admin/plan', 'PlanController');
    //Teacher Routes
    Route::resource('admin/teacher', 'TeacherController');
    //Gallery Routes
    Route::resource('admin/gallery', 'GalleryController');
    //About Routes
    Route::resource('admin/about', 'AboutController');
    //About Routes
    Route::resource('admin/link', 'LinkController');
    //CKEditor post img
    Route::post('upload-image', 'PostController@uploadimg');

});


Auth::routes();
