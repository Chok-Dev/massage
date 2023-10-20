<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommoControllerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MassageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('admin.dash');
//});

Auth::routes();

Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/add', 'store')->name('add');
        Route::post('/update', 'upandin')->name('update');
        Route::post('/drop', 'Dropup')->name('drop');
        Route::delete('/delevent/{del}', 'delevent')->name('delevent');

    });


    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee', 'employee')->name('employee');
        Route::post('/addemployee', 'Addemployee')->name('addemployee');
        Route::post('/upemployee', 'Upemployee')->name('upemployee');
        Route::delete('/delemployee/{emp}', 'Delemployee')->name('delemployee');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'Customer')->name('customer');
        Route::post('/addcustomer', 'Addcustomer')->name('addcustomer');
        Route::post('/upcustomer', 'Upcustomer')->name('upcustomer');
        Route::delete('/delcustomer/{cus}', 'Delcustomer')->name('delcustomer');
    });
    Route::controller(MassageController::class)->group(function () {
        Route::get('/massage', 'Massage')->name('massage');
        Route::post('/addmassage', 'Addmassage')->name('addmassage');
        Route::post('/upmassage', 'Upmassage')->name('upmassage');
        Route::delete('/delmassage/{mas}', 'Delmassage')->name('delmassage');

    });
    Route::controller(HistoryController::class)->group(function () {
        Route::get('/history', 'index')->name('history');

    });


    Route::controller(HelpController::class)->group(function () {
        Route::get('/help', 'index')->name('help');
        Route::post('/help', 'store')->name('addhelp');
    });

    Route::get('/dashboard', function () {
        return view('admin.dash');
    })->name("dashboard");


    /*Route::controller(CommoControllerController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/commodity', 'index')->name('commo');

        Route::get('/adminhelp', 'indexhelp')->name('adminhelp');
        Route::post('/adminhelp', 'updatehelp')->name('updatehelp');
        Route::delete('/delhelp/{help}', 'delhelp')->name('delhelp');


        Route::post('/commodity', 'store')->name('addcommo');
        Route::post('/commodityup', 'upsert')->name('editcommo');
        Route::delete('/commoditydel/{commodity}', 'destroy')->name('delcommo');
        Route::get('/qrcode', 'qrcode')->name('qrcode');
    });*/
});


