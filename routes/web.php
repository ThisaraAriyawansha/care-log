<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\IssueController;





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

/** for side bar menu active */
/*function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}*/

/*Route::get('/', function () {
   return view('welcome');
});*/
Route::get('/dashboard', [SiteSettingsController::class, 'showDashboard'])->name('main_panel');


//login
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);

//----dashbord-----//
Route::get('dash/dash', [DashboardController::class, 'dashboard'])->middleware('permission:17');

//item
Route::get('item/item', [ItemController::class, 'item'])->middleware('permission:19');
Route::get('item/item_list', [ItemController::class, 'item_list'])->middleware('permission:51');
Route::get('item/add_item', [ItemController::class, 'item_add'])->name('add_items')->middleware('permission:49');
Route::post('item/add_item', [ItemController::class, 'item_insert'])->name('add_itam')->middleware('permission:49');
Route::get('item/edit_item/{id}', [ItemController::class, 'edit'])->middleware('permission:56');
Route::post('item/edit_item/{id}', [ItemController::class, 'update'])->name('edit_item')->middleware('permission:56');
Route::get('item/delete/{id}', [ItemController::class, 'delete'])->middleware('permission:55');
Route::post('/payment-success', [ItemController::class, 'paymentSuccess'])->name('payment.store.success');
Route::get('item/importItem', [ItemController::class, 'importItem'])->middleware('permission:58');
Route::post('/import-items', [ItemController::class, 'importItems'])->middleware('permission:58');
Route::post('/value/toggle-status/{id}', [ItemController::class, 'toggleUserStatus']);
Route::post('/item/toggle-status/{id}', [ItemController::class, 'toggleItemStatus']);
Route::get('item/genarateCode', [GenarateQRController::class, 'genarate']);
Route::get('/ItemDetails/{itemCode}', [GenarateQRController::class, 'showItemDetails']);

//itemcategory
Route::get('item/category_list', [CategoryController::class, 'category_list'])->middleware('permission:52');
Route::get('item/add_category', [CategoryController::class, 'add_category'])->middleware('permission:50');
Route::post('item/add_category', [CategoryController::class, 'insert_category'])->name('add_category');
Route::get('item/edit_category/{id}', [CategoryController::class, 'edit_category'])->middleware('permission:53');
Route::post('item/edit_category/{id}', [CategoryController::class, 'update_category'])->name('edit_category')->middleware('permission:53');
Route::get('item/delete/{id}', [CategoryController::class, 'delete_category'])->middleware('permission:54');

// Validate item code by checking if it exists in the database
Route::get('/items/validate/{code}', [ItemController::class, 'validateItemCode']);




//users
Route::get('users/users', [UsersController::class, 'users'])->middleware('permission:22');
Route::get('users/permissionList', [UsersController::class, 'permissionList'])->middleware('permission:34');
Route::get('users/rolesList', [UsersController::class, 'rolesList'])->middleware('permission:33');
Route::get('users/usersList', [UsersController::class, 'usersList'])->middleware('permission:32');
Route::get('users/addPermission', [UsersController::class, 'addPermission'])->middleware('permission:31');
Route::get('users/addRole', [UsersController::class, 'addRole'])->middleware('permission:30');
Route::get('users/addUsers', [UsersController::class, 'addUsers'])->middleware('permission:29');
Route::get('users/updatePermission/{id}', [UsersController::class, 'editPermission'])->middleware('permission:38');
Route::get('updateRole/{id}', [UsersController::class, 'editRole'])->middleware('permission:37');
Route::get('updateUsers/{id}', [UsersController::class, 'editUsers'])->middleware('permission:36');
Route::post('/permissions', [UsersController::class, 'store'])->name('permissions.store')->middleware('permission:31');
Route::put('users/updatePermission/{id}', [UsersController::class, 'updatePermission'])->name('users.updatePermission')->middleware('permission:36');
Route::post('/role', [UsersController::class, 'storeRole'])->name('role.storeRole')->middleware('permission:30');
Route::post('/users/updateRole/{id}', [UsersController::class, 'updateRole'])->name('users.updateRole')->middleware('permission:37');
Route::post('/users', [UsersController::class, 'userstore'])->name('users.store')->middleware('permission:29');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('permission:36');
Route::post('/users/toggle-status/{id}', [UsersController::class, 'toggleUserStatus'])->middleware('permission:35');

//settings
Route::get('settings/settings', [SettingsController::class, 'settings'])->name('settings_page');
Route::get('settings/changePassword', [SettingsController::class, 'changePassword'])->middleware('permission:69');
Route::post('settings/changePassword', [SettingsController::class, 'updateChangePassword'])->middleware('permission:69');



//Stock
Route::get('stock/stock', [StockController::class, 'stock'])->middleware('permission:20');
Route::get('stock/addStock', [StockController::class, 'addStock'])->middleware('permission:20');
Route::get('stock/updateStock/{id}', [StockController::class, 'updateStock'])->middleware('permission:57');
Route::post('stock/updateStock', [StockController::class, 'storeStockUpdate'])->middleware('permission:57');


//donation
Route::get('donators/donators', [DonationController::class, 'donators'])->middleware('permission:19');
Route::get('donators/add_donation', [DonationController::class, 'adddonation'])->middleware('permission:19');
Route::post('/donation/store', [DonationController::class, 'store'])->name('donation.store');


//Issuer Routes
Route::get('issuers/issuers', [IssueController::class, 'issuers'])->middleware('permission:21');
Route::get('issuers/getgoods', [IssueController::class, 'getgoods'])->middleware('permission:21');
Route::post('/issuers/store', [IssueController::class, 'store'])->name('issue.store');
