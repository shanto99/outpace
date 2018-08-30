<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('profile');
});*/
Route::group(['middleware'=>['web']],function() {

    Route::get('/ttt', [
        'uses' => 'HomeController@test_it',
        'as' => 'ttt'
    ]);


    Route::get('/', [
        'uses' => 'HomeController@login_page',
        'as' => 'loginpage'
    ]);
    Route::get('/createpi', [
        'uses' => 'HomeController@createpi',
        'as' => 'createpi',
        'middleware'=>'auth'
    ]);
    Route::get('/profile', [
        'uses' => 'HomeController@profile',
        'as' => 'profile'
    ]);
    Route::get('/Create_Document', [
        'uses' => 'HomeController@create_document',
        'as' => 'create_document',
        'middleware' => 'auth'
    ]);
    Route::get('/Edit_Bank_Information', [
        'uses' => 'HomeController@edit_bank_info',
        'as' => 'edit_bank_info'
    ]);
    Route::get('/Edit_Buyer_Information', [
        'uses' => 'HomeController@edit_buyer_info',
        'as' => 'edit_buyer_info'
    ]);
    Route::get('/Create_LC', [
        'uses' => 'HomeController@createlc',
        'as' => 'createlc'
    ]);
    Route::post('/login', [
        'uses' => 'HomeController@login_action',
        'as' => 'login'
    ]);
    Route::get('/logout',[
        'uses' => 'HomeController@logout',
        'as' => 'logout'
    ]);
    Route::get('/notification', [
        'uses' => 'HomeController@notification',
        'as' => 'notification'
    ]);
    Route::get('/search', [
        'uses' => 'HomeController@search',
        'as' => 'search'
    ]);
    // This route was used for making change in user profile
    Route::post('/change_profile',[
       'uses' => 'HomeController@change_profile',
        'as' => 'change_profile'
    ]);
   //This route was used for dynamically loading branches depending on Bnak(used in app.js)
    Route::get('/bankurl', ['as' => 'select_bank', 'uses' => 'HomeController@select_bank']);
    //This route was used for filling up the input fields of bank (used in app.js)
    Route::get('/branchurl',['as' => 'select_branch','uses' => 'HomeController@select_branch']);
    //This was used for making change in bank info with php
    Route::post('/edit_bank',[
       'uses' => 'HomeController@edit_bank',
        'as' => 'edit_bank'
    ]);
    Route::get('/get_buyer',['as' => 'get_buyer', 'uses' => 'HomeController@get_buyer']);
    Route::get('/get_pi_associated_do',['as'=>'get_pi_associated_do','uses'=>'HomeController@get_pi_associated_do']);
    Route::get('/get_do_goods',['as'=>'get_do_goods','uses'=>'HomeController@get_do_goods']);
    Route::post('/delivered_do_product',[
       'as' => 'delivered_do_product',
        'uses' => 'HomeController@delivered_do_product'
    ]);
    Route::get('/get_unit_price',[
       'as' => 'get_unit_price',
        'uses' => 'HomeController@get_unit_price'
    ]);
    //The Route Handles Adding and Updating a buyer
    Route::post('/change_buyer',[
        'as' => 'change_buyer',
        'uses' => 'HomeController@change_buyer'
    ]);
    Route::get('/doinsertgoods',[
       'as' => 'doinsertgoods',
        'uses' => 'HomeController@doinsertgoods'
    ]);
    Route::get('/confirm_pi',[
        'as' => 'confirm_pi',
        'uses' => 'NotificationController@confirm_pi'
    ]);
    Route::get('/pick_ammendment',[
       'as' => 'pick_ammendment',
        'uses' => 'HomeController@pick_ammendment'
    ]);
    Route::get('/doinsertlc',[
       'uses' => 'HomeController@doinsertlc',
        'as' => 'doinsertlc'
    ]);
    Route::get('/populate_goods',[
       'uses' => 'NotificationController@populate_goods',
        'as' => 'populate_goods'
    ]);
    Route::get('/populate_do_goods',[
       'uses' => 'NotificationController@populate_do_goods',
        'as' => 'populate_do_goods'
    ]);
    Route::get('/populate_pi_goods',[
       'uses' => 'NotificationController@populate_pi_goods',
        'as'=>'populate_pi_goods'
    ]);
    Route::get('/pi_pdf/{pdf_values}',[
        'as' => 'pi_pdf',
        'uses' => 'HomeController@pi_pdf'
    ]);
    Route::get('/pi_data_global',[
       'as' => 'pi_data_global',
        'uses' => 'HomeController@pi_data_global'
    ]);
    Route::get('generate_pi_pdf', 'HomeController@generate_pi_pdf');
    Route::get('/create_doc',[
       'as' => 'create_doc',
        'uses' => 'HomeController@create_doc'
    ]);
    Route::get('/get_goods',[
        'as'=>'get_goods',
        'uses' => 'HomeController@get_goods'
    ]);
    Route::get('/get_price',[
        'as'=>'get_price',
        'uses' => 'HomeController@get_price'
    ]);
    Route::get('/products',[
        'as' => 'products',
        'uses' => 'HomeController@products'
    ]);
    Route::post('/insert_product',[
        'as' => 'insert_product',
        'uses' => 'HomeController@insert_product'
    ]);
    Route::get('/delete_product/{id}',[
        'as' => 'delete_product',
        'uses' => 'HomeController@delete_product'
    ]);
    Route::get('/notification_delete/{notification_id}',[
        'as' => 'notification_delete',
        'uses' => 'NotificationController@notification_delete'
    ]);
    Route::get('/notification_detail/{type}/{doc_id}/{part}',[
       'as' => 'notification_detail',
        'uses' => 'NotificationController@notification_detail'
    ]);
    Route::post('/lc_confirm',[
       'as'=>'lc_confirm',
        'uses'=>'NotificationController@lc_confirm'
    ]);
    Route::get('/advance_do',[
       'as'=>'advance_do',
        'uses'=>'NotificationController@advance_do'
    ]);
    Route::get('/populate_goods_pi',[
        'as'=>'populate_goods_pi',
        'uses'=>'NotificationController@populate_goods_pi'
    ]);
    Route::get('/do_goods',[
        'as'=>'do_goods',
        'uses'=>'NotificationController@do_goods'
    ]);
    Route::get('/populate_advance_goods',[
           'as' => 'populate_advance_goods',
            'uses' => 'NotificationController@populate_advance_goods'
        ]);
    Route::get('/save_do_detail',[
        'as'=>'save_do_detail',
        'uses' => 'NotificationController@save_do_detail'
    ]);
    Route::get('/revise_do',[
       'as'=>'revise_do',
        'uses'=>'NotificationController@revise_do'
    ]);
    Route::get('/count_pi',[
       'as' => 'count_pi',
        'uses' => 'NotificationController@count_pi'
    ]);
    Route::get('/get_do_detail',[
       'as'=>'get_do_detail',
        'uses'=>'NotificationController@get_do_detail'
    ]);
    Route::get('/add_del_com',[
       'as' => 'add_del_com',
        'uses' => 'HomeController@add_del_com'
    ]);
    Route::post('/route_add_del_com',[
       'as' => 'route_add_del_com',
        'uses' => 'HomeController@route_add_del_com'
    ]);
    Route::get('/wfca',[
        'as'=>'wfca',
        'uses'=>'HomeController@wfca'
    ]);
    Route::get('/wfba',[
        'as'=>'wfba',
        'uses'=>'HomeController@wfba'
    ]);
    Route::get('/add_bank_submission_ref',[
       'as' => 'add_bank_submission_ref',
        'uses' => 'HomeController@add_bank_submission_ref'
    ]);
    Route::post('/route_wfba',[
       'as' => 'route_wfba',
        'uses' => 'HomeController@route_wfba'
    ]);
    Route::get('/add_maturity',[
       'as' => 'add_maturity',
        'uses' => 'HomeController@add_maturity'
    ]);
    Route::post('/route_drp',[
       'as' => 'route_drp',
        'uses' => 'HomeController@route_drp'
    ]);
    Route::get('/drp',[
       'as' => 'drp',
        'uses' => 'HomeController@drp'
    ]);
    Route::get('/add_purchase_date',[
       'as' => 'add_purchase_date',
        'uses' => 'HomeController@add_purchase_date'
    ]);
    Route::post('/route_purchase',[
       'as' => 'route_purchase',
        'uses' => 'HomeController@route_purchase'
    ]);
    Route::get('/purchase_table',[
        'as' => 'purchase_table',
        'uses' => 'HomeController@purchase_table'
    ]);
    Route::get('/payment_receive',[
        'as'=> 'payment_receive',
        'uses' => 'HomeController@payment_receive'
    ]);
    Route::get('/order_in_hand',[
       'uses' => 'HomeController@order_in_hand',
        'as' => 'order_in_hand'
    ]);
    Route::post('/route_realization',[
       'as' => 'route_realization',
        'uses' => 'HomeController@route_realization'
    ]);
    Route::get('/realization_table',[
       'as' => 'realization_table',
        'uses' => 'HomeController@realization_table'
    ]);
    Route::get('generate_doc_pdf', 'PdfController@generate_doc_pdf');
    Route::get('/daily_input',[
        'uses' => 'HomeController@daily_input',
        'as' => 'daily_input'
    ]);
    Route::get('/return_goods',[
       'as' => 'return_goods',
        'uses' => 'HomeController@return_goods'
    ]);
    Route::get('/get_delivered_pi',[
       'as' => 'get_delivered_pi',
        'uses' => 'HomeController@get_delivered_pi'
    ]);
    Route::get('/get_delivered_product',[
       'as' => 'get_delivered_product',
        'uses' => 'HomeController@get_delivered_product'
    ]);
    Route::get('/get_delivered_unit_price',[
       'as' => 'get_delivered_unit_price',
        'uses' => 'HomeController@get_delivered_unit_price'
    ]);
    Route::post('/return_goods_input',[
        'as'=>'return_goods_input',
        'uses'=>'HomeController@return_goods_input'
    ]);
    Route::get('/replacement_input',[
       'as' => 'replacement_input',
        'uses' => 'HomeController@replacement_input'
    ]);
    Route::get('/replace_buyer_lc',[
       'as' => 'replace_buyer_lc',
        'uses' => 'HomeController@replace_buyer_lc'
    ]);
    Route::get('/get_my_pi',[
       'as' => 'get_my_pi',
        'uses' => 'HomeController@get_my_pi'
    ]);
    Route::post('/save_replacement',[
       'as' => 'save_replacement',
        'uses' => 'HomeController@save_replacement'
    ]);
    Route::get('/input_costs',[
       'as' => 'input_costs',
        'uses' => 'HomeController@input_costs'
    ]);
    Route::get('/get_short_payment',[
       'as' => 'get_short_payment',
        'uses' => 'HomeController@get_short_payment'
    ]);
    Route::post('/save_net_realization',[
       'as' => 'save_net_realization',
        'uses' => 'HomeController@save_net_realization'
    ]);
    Route::get('/net_realization_table',[
       'as' => 'net_realization_table',
        'uses' => 'HomeController@net_realization_table'
    ]);
    Route::get('/confirm_advance_do',[
       'as' => 'confirm_advance_do',
        'uses' => 'HomeController@confirm_advance_do'
    ]);
    Route::get('/get_pi_sl',[
       'as' => 'get_pi_sl',
        'uses' => 'HomeController@get_pi_sl'
    ]);
    Route::get('/get_doc_number',[
       'as' => 'get_doc_number',
        'uses' => 'HomeController@get_doc_number'
    ]);
});
