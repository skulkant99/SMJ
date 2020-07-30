<?php

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

Route::group(['middleware' => 'auth'], function () {

    //User

    Route::get('backoffice/users', 'UsersController@index');
    Route::get('backoffice/users/create', 'UsersController@create');
    Route::post('backoffice/users/create/users', 'UsersController@create_users');
    Route::get('backoffice/del/users/{id}', 'UsersController@del');
    Route::get('backoffice/users/update/{id}', 'UsersController@update');
    Route::post('backoffice/users/update/users', 'UsersController@update_user');

    //Banner

    Route::get('backoffice/banner', 'BannerController@index');
    Route::get('backoffice/banner/create/banner', 'BannerController@create');
    Route::post('backoffice/banner/create', 'BannerController@create_banner');
    Route::get('backoffice/del/banner/{id}', 'BannerController@del');
    Route::get('backoffice/banner/update/{id}', 'BannerController@updated');
    Route::post('backoffice/banner/update', 'BannerController@update_banner');
    Route::get('ajax_setbanner/{id}', 'BannerController@ajax_setbanner');
    Route::get('ajax_unsetbanner/{id}', 'BannerController@ajax_unsetbanner');
    Route::get('ajax_bannersort/{id}/{sort}', 'BannerController@ajax_changesort');

    //Partner

    Route::get('backoffice/partner', 'BannerController@partner');
    Route::get('backoffice/partner/create/partner', 'BannerController@created');
    Route::post('backoffice/partner/create', 'BannerController@create_partner');
    Route::get('backoffice/del/partner/{id}', 'BannerController@del_partner');
    Route::get('backoffice/partner/update/{id}', 'BannerController@update');
    Route::post('backoffice/partner/update', 'BannerController@update_partner');
    Route::get('ajax_setpartner/{id}', 'BannerController@ajax_setpartner');
    Route::get('ajax_unsetpartner/{id}', 'BannerController@ajax_unsetpartner');
    Route::get('ajax_partnersort/{id}/{sort}', 'BannerController@ajax_partnersort');

    
    //activities

    Route::get('backoffice/activities', 'ActivitiesController@index');
    Route::get('backoffice/activities/create/activities', 'ActivitiesController@create');
    Route::post('backoffice/activities/create', 'ActivitiesController@create_activities');
    Route::get('backoffice/del/activities/{id}', 'ActivitiesController@del_activities');
    Route::get('backoffice/activities/update/{id}', 'ActivitiesController@updated');
    Route::post('backoffice/activities/update', 'ActivitiesController@update_activities');

    //knowledge

    Route::get('backoffice/knowledge', 'KnowledgeController@index');
    Route::get('backoffice/knowledge/create/knowledge', 'KnowledgeController@create');
    Route::post('backoffice/knowledge/create', 'KnowledgeController@create_knowledge');
    Route::get('backoffice/del/knowledge/{id}', 'KnowledgeController@del_knowledge');
    Route::get('backoffice/knowledge/update/{id}', 'KnowledgeController@updated');
    Route::post('backoffice/knowledge/update', 'KnowledgeController@update_knowledge');
    Route::get('ajax_knowledgesort/{id}/{sort}', 'KnowledgeController@ajax_knowledgesort');

    //references

    Route::get('backoffice/references', 'ReferencesController@index');
    Route::get('backoffice/references/create/references', 'ReferencesController@create');
    Route::post('backoffice/references/create', 'ReferencesController@create_references');
    Route::get('backoffice/del/references/{id}', 'ReferencesController@del_references');
    Route::get('backoffice/references/update/{id}', 'ReferencesController@updated');
    Route::post('backoffice/references/update', 'ReferencesController@update_references');
    Route::get('backoffice/referencesimg_del/{id}', 'ReferencesController@delete_referencesimg');
    Route::get('ajax_referencessort/{id}/{sort}', 'ReferencesController@ajax_referencessort');

    //references/type

    Route::get('backoffice/references/type', 'ReferencesController@type');
    Route::post('ajax_createreferences', 'ReferencesController@ajax_createtype');
    Route::get('backoffice/references/type/del/{id}', 'ReferencesController@del_type');
    Route::get('ajax_updatereferences/{id}', 'ReferencesController@type_update');
    Route::post('ajax_updatereferences', 'ReferencesController@type_updated');
    Route::get('ajax_typesort/{id}/{sort}', 'ReferencesController@ajax_typesort');

    //career

    Route::get('backoffice/career', 'CareerController@index');
    Route::get('backoffice/career/files', 'CareerController@index2');
    Route::get('backoffice/career/create/career', 'CareerController@create');
    Route::post('backoffice/career/create', 'CareerController@create_career');
    Route::get('backoffice/del/career/{id}', 'CareerController@del_career');
    Route::get('backoffice/career/update/{id}', 'CareerController@updated');
    Route::post('backoffice/career/update', 'CareerController@update_career');
    Route::get('backoffice/del/description_del/{id}', 'CareerController@del_description');
    Route::get('backoffice/del/qualifications_del/{id}', 'CareerController@del_qualifications');
    Route::get('backoffice/del/responsibility_del/{id}', 'CareerController@del_responsibility');
    Route::get('backoffice/del/information_del/{id}', 'CareerController@del_information');

    //product

    Route::get('backoffice/product', 'ProductController@index');
    Route::get('backoffice/product/create', 'ProductController@create');
    Route::post('backoffice/product/create_create', 'ProductController@create_product');
    Route::get('backoffice/product/update/{id}', 'ProductController@update');
    Route::get('backoffice/del/product/{id}', 'ProductController@del');
    Route::post('backoffice/product/update', 'ProductController@update_update');
    Route::get('backoffice/del/productimg_del/{id}', 'ProductController@delete_productimg');
    Route::get('backoffice/del/list_del/{id}', 'ProductController@del_list');
    Route::post('get_subcategory', 'ProductController@get_subcategory');
    Route::post('get_subcategory2', 'ProductController@get_subcategory2');
    Route::get('delconmain/{id}', 'ProductController@delconmain');
    Route::get('delconsub/{id}', 'ProductController@delconsub');
    Route::get('ajax_productsort/{id}/{sort}', 'ProductController@ajax_productsort');

    //contactus

    Route::get('backoffice/contactus', 'ContactusController@index');

    //summernote
    Route::post('images_editor_event', 'SummernoteController@postEditor');

    //category

    Route::get('backoffice/cat', 'CatController@index');
    Route::get('backoffice/cat/create/cat', 'CatController@create');
    Route::post('backoffice/cat/create', 'CatController@create_cat');
    Route::get('backoffice/del/cat/{id}', 'CatController@del_cat');
    Route::get('backoffice/cat/update/{id}', 'CatController@updated');
    Route::post('backoffice/cat/update', 'CatController@update_cat');

    //category1

    Route::get('backoffice/cat1', 'CatController@cat1');
    Route::get('backoffice/cat1/create/cat1', 'CatController@created');
    Route::post('backoffice/cat1/create', 'CatController@create_cat1');
    Route::get('backoffice/del/cat1/{id}', 'CatController@del_cat1');
    Route::get('backoffice/cat1/update/{id}', 'CatController@update');
    Route::post('backoffice/cat1/update', 'CatController@update_cat1');

     //category2

     Route::get('backoffice/cat2', 'CatController@cat2');
     Route::get('backoffice/cat2/create/cat2', 'CatController@created_cat2');
     Route::post('backoffice/cat2/create', 'CatController@create_cat2');
     Route::get('backoffice/del/cat2/{id}', 'CatController@del_cat2');
     Route::get('backoffice/cat2/update/{id}', 'CatController@updated_cat2');
     Route::post('backoffice/cat2/update', 'CatController@update_cat2');



});

//เปลี่ยนภาษา

Session::put('lang', 'en');
Route::get('/en', function () {
    Session::put('lang', 'en');
    return back();
});
Route::get('/th', function () {
    Session::put('lang', 'th');
    return back();
});

Auth::routes();
Route::get('backoffice', 'Auth\LoginController@ShowLoginForm');
Route::get('Logout', 'Auth\LoginController@logout');

// Route::get('/backoffice', 'HomeController@index')->name('home');
// Route::get('/home','HomeController@index');
// Route::get('/logout','BackofficeController@logout');

//Frontend
Route::get('/about', 'FrontendController@about');
Route::get('/activity_all', 'FrontendController@activity_all');
Route::get('/activity_detail/{id}', 'FrontendController@activity_detail');
Route::get('/activity', 'FrontendController@activity');
Route::get('/career', 'FrontendController@career');
Route::post('/career/upload_resume', 'FrontendController@career_upload_resume');
Route::get('/contact', 'FrontendController@contact');
Route::get('/inc_footer', 'FrontendController@inc_footer');
Route::get('/inc_header', 'FrontendController@inc_header');
Route::get('/inc_productmenu', 'FrontendController@inc_productmenu');
Route::get('/inc_topbutton', 'FrontendController@inc_topbutton');
Route::get('/inc_topmenu', 'FrontendController@inc_topmenu');
Route::get('/', 'FrontendController@index');
Route::get('/knowledge_all', 'FrontendController@knowledge_all');
Route::get('/knowledge_detail/{id}', 'FrontendController@knowledge_detail');
Route::get('/knowledge', 'FrontendController@knowledge');
Route::get('/product_detail/{id}', 'FrontendController@product_detail');
// Route::get('/product/{id}','FrontendController@product');
Route::get('/product/{id}', 'FrontendController@product_id');
Route::get('/product/{id}/{sub_id}', 'FrontendController@product_sub_id');
Route::get('/product/{id}/{sub_id}/{super_sub_id}', 'FrontendController@product_super_sub_id');
Route::get('/references/{id}', 'FrontendController@references');
Route::get('/references/{id}', 'FrontendController@references_id');
Route::post('/contact/contact_us', 'FrontendController@contact_us');
Route::post('/ajax', 'FrontendController@product_ajax');