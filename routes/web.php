<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Project Types
    Route::delete('project-types/destroy', 'ProjectTypeController@massDestroy')->name('project-types.massDestroy');
    Route::post('project-types/parse-csv-import', 'ProjectTypeController@parseCsvImport')->name('project-types.parseCsvImport');
    Route::post('project-types/process-csv-import', 'ProjectTypeController@processCsvImport')->name('project-types.processCsvImport');
    Route::resource('project-types', 'ProjectTypeController');

    // Project Details
    Route::delete('project-details/destroy', 'ProjectDetailsController@massDestroy')->name('project-details.massDestroy');
    Route::post('project-details/media', 'ProjectDetailsController@storeMedia')->name('project-details.storeMedia');
    Route::post('project-details/ckmedia', 'ProjectDetailsController@storeCKEditorImages')->name('project-details.storeCKEditorImages');
    Route::post('project-details/parse-csv-import', 'ProjectDetailsController@parseCsvImport')->name('project-details.parseCsvImport');
    Route::post('project-details/process-csv-import', 'ProjectDetailsController@processCsvImport')->name('project-details.processCsvImport');
    Route::resource('project-details', 'ProjectDetailsController');

    // Contacts
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::post('contacts/parse-csv-import', 'ContactController@parseCsvImport')->name('contacts.parseCsvImport');
    Route::post('contacts/process-csv-import', 'ContactController@processCsvImport')->name('contacts.processCsvImport');
    Route::resource('contacts', 'ContactController');

    // Blogs
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Photos
    Route::delete('photos/destroy', 'PhotosController@massDestroy')->name('photos.massDestroy');
    Route::post('photos/media', 'PhotosController@storeMedia')->name('photos.storeMedia');
    Route::post('photos/ckmedia', 'PhotosController@storeCKEditorImages')->name('photos.storeCKEditorImages');
    Route::post('photos/parse-csv-import', 'PhotosController@parseCsvImport')->name('photos.parseCsvImport');
    Route::post('photos/process-csv-import', 'PhotosController@processCsvImport')->name('photos.processCsvImport');
    Route::resource('photos', 'PhotosController');

    // Videos
    Route::delete('videos/destroy', 'VideosController@massDestroy')->name('videos.massDestroy');
    Route::post('videos/parse-csv-import', 'VideosController@parseCsvImport')->name('videos.parseCsvImport');
    Route::post('videos/process-csv-import', 'VideosController@processCsvImport')->name('videos.processCsvImport');
    Route::resource('videos', 'VideosController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/projects', 'HomeController@projects');
Route::get('/photo-gallery', 'HomeController@photogallery');
//Route::get('/contact', 'HomeController@contact');
Route::get('/contact',  ['as'=>'contacts.index','uses'=>'HomeController@contact']);
Route::post('/contactusStore', ['as'=>'contactus.store','uses'=>'HomeController@contactStore']);
Route::get('/thank-you',  ['as'=>'contacts.thankyou','uses'=>'HomeController@thankyou']);
