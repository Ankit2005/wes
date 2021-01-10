<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('account/login');
});

Route::get('/congratulations', function () {
    return view('congratulations');
});
Route::get('/404', function () {
    return view('notFound');
});

Route::get('/', function () {
    return view('account/register');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('congratulations');
});

Route::get('/default', function () {
    return view('template.default');
});

Route::post('/dumy','test@result');

Route::get('/authenticate', function () {
    return view('erp.authenticate');
});


Route::get('/{query}/{string}', function ($query, $string) {
    if($query == 'erp'){
        $query = array(
            'query' => $query,
            'string' => $string
        );
        $query = json_encode($query);
        $query = base64_encode($query);
        return redirect('api/company/'.$query);
    }
});

Route::get('/accounting', function () {
    return view('template.adminTemplate.accountingTemplate');
});

Route::get('/newledger', function () {
    return view('accounting.ledger.newLedger');
});

// Route::get('/api/company', function () {
//     return view('congratulations');
// });


// Admin Panel Routing Start

Route::get('/admin', function () {
    return view('adminPanelView.teamDesign');
    // return view('template.adminTemplate.adminTemplate');
});

Route::get('/newLedger', function () {
    return view('accounting.ledger.newLedger');
});

Route::get('/stocks', function () {
    return view('accounting.stocks.stocks');
});



// Route::get('/teamdesign', function () {
//     return view('adminPanelView.teamDesign');
// });

// Admin Panel Routing End
