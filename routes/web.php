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

/*Машрут для GET запроса, переход на главную страницу*/

use Illuminate\Support\Facades\Auth;

Route::get( '/', function () {
    return view( 'loginPage' );
} );

/*Машрут на GET запрос, перехода на страницу настроек*/
Route::get( '/settings', function () {
    return view( 'settings' );
} )->middleware( 'auth' )->name('settings');

Route::post( '/updateUser', 'UpdateUserController@updateUser' )->middleware( 'auth' )->name('updateUser');

Route::get( '/analytics/{companyName}', 'CompanyAnalyticsController@analytics')->middleware( 'auth' )->name('analytics');

Route::post('/getImplementationOfTheTrainingPlan','AxiosCompanyChartController@analyticsGetStaffTurnoverRate')->name('getImplementationOfTheTrainingPlan');
Route::post('/getNeedForStaffYear','AxiosCompanyChartController@getNeedForStaffYear')->name('getNeedForStaffYear');
Route::post('/transferEmployeeToAnotherObject','PersonnelManagementController@transferToAnotherObject');
Route::post('/transferEmployeeToAnotherCompany','PersonnelManagementController@transferToAnotherCompany');
Route::post('/deleteEmployee','PersonnelManagementController@transferToAnotherCompany');

Route::name( 'user.' )->group( function () {

    if ( Auth::check() ) {
        return redirect( route( 'user.private' ) );
    }
    Route::view( '/private', 'companySelectionPage' )->middleware( 'auth' )->name( 'private' );

    Route::get( '/login', function () {
        if ( Auth::check() ) {
            return redirect( route( 'user.private' ) );
        }
        return view( 'loginPage' );
    } )->name( 'login' );

    Route::post( '/login', [ \App\Http\Controllers\LoginController::class, 'login' ] );

    Route::get( '/logout', function () {
        Auth::logout();
        return redirect( '/' );
    } )->name( 'logout' );
    Route::get( '/registration', function () {
        return view( 'addingAnEmployee' );
    } )->middleware( 'auth' )->name( 'registration' );

    Route::post( '/registration', [ \App\Http\Controllers\RegisterController::class, 'save' ] )->middleware( 'auth' );
} );

