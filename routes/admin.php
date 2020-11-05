<?php
Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::get('/Logout', 'Admin\AuthController@Logout');
Route::post('/CheckLogin', 'Admin\AuthController@checkLogin');

Route::middleware('authAdmin:admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/Dashboard', 'Admin\DashboardController@index');

    //get Province, Amphur, zipcode
    Route::get('GetProvinceByGeography/{geo_id}','Admin\DashboardController@GetProvinceByGeography');
    Route::get('GetAmphurByProvince/{provinces_id}','Admin\DashboardController@GetAmphurByProvince');
    Route::get('GetDistrictByAmphur/{amphur_id}','Admin\DashboardController@GetDistrictByAmphur');
    Route::get('GetZipcodeByDistrict/{districts_code}','Admin\DashboardController@GetZipcodeByDistrict');

    Route::post('UploadFile/{folder}','Admin\UploadFileController@UploadFile');

    Route::get('/AdminUser/Lists', 'Admin\AdminUserController@lists');
    Route::resource('AdminUser', 'Admin\AdminUserController');
    Route::post('/AdminUser/ChangeStatus/{id}', 'Admin\AdminUserController@ChangeStatus');
    Route::post('/AdminUser/SetPremission/{id}', 'Admin\AdminUserController@SetPremission');
    Route::post('/AdminUser/ResetPassword/{id}', 'Admin\AdminUserController@ResetPassword');

    Route::get('/AdminUserGroup/Lists', 'Admin\AdminUserGroupController@lists');
    Route::resource('AdminUserGroup', 'Admin\AdminUserGroupController');
    Route::post('/AdminUserGroup/ChangeStatus/{id}', 'Admin\AdminUserGroupController@ChangeStatus');
    Route::post('/AdminUserGroup/SetPremission/{id}', 'Admin\AdminUserGroupController@SetPremission');

    Route::post('/News/Lists', 'Admin\NewsController@lists');
    Route::resource('News', 'Admin\NewsController');
    Route::post('/News/ChangeStatus/{id}', 'Admin\NewsController@ChangeStatus');
    Route::post('/News/Delete/{id}', 'Admin\NewsController@Delete');

    Route::post('/NewsCategory/Lists', 'Admin\NewsCategoryController@lists');
    Route::resource('NewsCategory', 'Admin\NewsCategoryController');
    Route::post('/NewsCategory/ChangeStatus/{id}', 'Admin\NewsCategoryController@ChangeStatus');
    Route::post('/NewsCategory/Delete/{id}', 'Admin\NewsCategoryController@Delete');

    Route::post('/NewsSetting/Lists', 'Admin\NewsSettingController@lists');
    Route::resource('NewsSetting', 'Admin\NewsSettingController');
    Route::post('/NewsSetting/ChangeStatus/{id}', 'Admin\NewsSettingController@ChangeStatus');

    Route::post('/Enquiries/Lists', 'Admin\EnquiriesController@lists');
    Route::resource('Enquiries', 'Admin\EnquiriesController');
    Route::post('/Enquiries/ChangeStatus/{id}', 'Admin\EnquiriesController@ChangeStatus');
    Route::post('/Enquiries/AddComment/{id}', 'Admin\EnquiriesController@AddComment');
    Route::post('/Enquiries/Delete/{id}', 'Admin\EnquiriesController@Delete');

    Route::post('/EnquiriesSetting/Lists', 'Admin\EnquiriesSettingController@lists');
    Route::resource('EnquiriesSetting', 'Admin\EnquiriesSettingController');
    Route::post('/EnquiriesSetting/ChangeStatus/{id}', 'Admin\EnquiriesSettingController@ChangeStatus');
    Route::post('/EnquiriesSetting/AddFieldInput', 'Admin\EnquiriesSettingController@AddFieldInput');
    
    Route::post('/Faqs/Lists', 'Admin\FaqsController@lists');
    Route::resource('Faqs', 'Admin\FaqsController');
    Route::post('/Faqs/ChangeStatus/{id}', 'Admin\FaqsController@ChangeStatus');
    Route::post('/Faqs/Delete/{id}', 'Admin\FaqsController@Delete');

    Route::post('/FaqsSetting/Lists', 'Admin\FaqsSettingController@lists');
    Route::resource('FaqsSetting', 'Admin\FaqsSettingController');
    Route::post('/FaqsSetting/ChangeStatus/{id}', 'Admin\FaqsSettingController@ChangeStatus');

});

?>
