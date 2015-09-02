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


use avaluestay\Contracts\ServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;


Route::get("/", "FrontEndController@search");


Route::get("property/{propertyId}", "FrontEndController@getProperty");

Route::get("booking/success", "InvoicesController@paymentSuccess");
Route::get("booking/fail", "InvoicesController@paymentFail");
Route::get("booking/error", "InvoicesController@paymentError");





Route::group(['middleware' => 'auth'], function () {

    Route::post('/invoices', "InvoicesController@store");

    Route::post("/favorites/{propertyId}", "WishListsController@toggleMyFavorite");


    Route::patch('/properties/{propertyId}/services/{serviceId}', 'ServicesController@updateServices');
    Route::post('/properties/{propertyId}/services', 'ServicesController@store');
    Route::resource('/services', 'ServicesController');

    Route::get('/properties/next/{propertyId}', 'PropertiesController@registrationNext');
    Route::post('/properties/{propertyId}/media', 'PropertiesController@uploadMedia');
    Route::get("property/updateListStatus/{id}", 'PropertiesController@toggleListingStatus');
    Route::resource('/properties', 'PropertiesController');
    Route::patch('/bankinfo/{propertyId}', 'BankinfoController@updateBankInfo');

    Route::get('/users/subscription', [
        'as'   => 'user.subscription',
        'uses' => "UsersController@subscription"
    ]);

    Route::get('/profile', 'UsersController@profile');
    Route::resource('/users', 'UsersController');


    Route::resource("/messages", "MessagesController");
    Route::post("/messages/receiver/{receiverId}", "MessagesController@newsendMessage");
    Route::post("/messages/sender/{senderId}/receiver/{recieverId}", "MessagesController@sendMessage");
    Route::get("/messages/sender/{senderId}/receiver/{recieverId}", "MessagesController@getMessages");

    Route::resource("/media", "MediaController");


    Route::group(['middleware' => 'hasRole:manager', "prefix" => "manager"], function () {
        Route::get('/invoices', "ManagerController@invoices");
        Route::get('/invoices/{orderRef}', "ManagerController@showInvoice");
        Route::get('/properties', "ManagerController@properties");
        Route::get('/property/{propertyId}/approval', "ManagerController@propertiesApproval");
        Route::get('/property/{propertyId}/disapproval', "ManagerController@propertiesDisapproval");
        Route::get('/property/{propertyId}/show', "ManagerController@propertyShow");
        Route::resource('/', "ManagerController");
    });
});


Route::get("pSuccess", "PaymentController@pSuccess");
Route::get("pFail", "PaymentController@pFail");
Route::get("pError", "PaymentController@pError");


/**
 * The route response for handling login, logout, registration and password reset.
 */
Route::controllers([
                       'auth'     => 'Auth\AuthController',
                       'password' => 'Auth\PasswordController',
                   ]);



