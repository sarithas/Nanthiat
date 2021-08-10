<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Project Details
    Route::post('project-details/media', 'ProjectDetailsApiController@storeMedia')->name('project-details.storeMedia');
    Route::apiResource('project-details', 'ProjectDetailsApiController');

    // Contacts
    Route::apiResource('contacts', 'ContactApiController');

    // Blogs
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Photos
    Route::post('photos/media', 'PhotosApiController@storeMedia')->name('photos.storeMedia');
    Route::apiResource('photos', 'PhotosApiController');

    // Videos
    Route::apiResource('videos', 'VideosApiController');
});
