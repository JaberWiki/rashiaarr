<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\LedgerController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\RecieptController;
use App\Http\Controllers\Backend\BalanceController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\ReportController;
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



Route::get('/', function(){
	return redirect('/admin/login');
});


//Admin Routes

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});


Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'getAdminData'])->name('admin.profile');
Route::post('/admin/profile/update',[AdminProfileController::class, 'updateAdminData'])->name('admin.profile.update');
Route::get('/admin/password/reset',[AdminProfileController::class, 'resetAdminPassword'])->name('admin.password.reset');
Route::post('/admin/password/update',[AdminProfileController::class, 'updateAdminPassword'])->name('admin.password.update');


//Admin Branch Setting

Route::prefix('admin/branch/')->group(function(){
	Route::get('add', [BranchController::class, 'AddBranch'])->name('admin.branch.add');
	Route::post('store', [BranchController::class, 'StoreBranch'])->name('admin.branch.store');
	Route::get('show', [BranchController::class, 'ShowBranchList'])->name('admin.branch.show');
	Route::get('delete/{id}', [BranchController::class, 'deleteBranch']);
	Route::get('edit/{id}', [BranchController::class, 'editBranch']);
	Route::post('update/{id}', [BranchController::class, 'updateBranch']);
	Route::get('report/{id}', [BranchController::class, 'BranchRepot']);
	Route::get('allreport/{id}', [BranchController::class, 'TotalBranchRepot']);
	Route::get('search/{id}', [BranchController::class, 'searchReport']);
	Route::post('generatereport', [BranchController::class, 'generateReport'])->name('admin.branch.generatereport');
});

//Admin Ledger Setting

Route::prefix('admin/ledger/')->group(function(){
	Route::get('add', [LedgerController::class, 'AddLedger'])->name('admin.ledger.add');
	Route::post('store', [LedgerController::class, 'StoreLedger'])->name('admin.ledger.store');
	Route::get('show', [LedgerController::class, 'ShowLedgerList'])->name('admin.ledger.show');
	Route::get('delete/{id}', [LedgerController::class, 'deleteLedger']);
	Route::get('edit/{id}', [LedgerController::class, 'editLedger']);
	Route::post('update/{id}', [LedgerController::class, 'updateLedger']);
	Route::get('report/{id}', [LedgerController::class, 'LedgerRepot']);
	Route::get('totalreport/{id}', [LedgerController::class, 'TotalLedgerRepot']);
	Route::get('search/{id}', [LedgerController::class, 'searchReport']);
	Route::post('generatereport', [LedgerController::class, 'generateReport'])->name('admin.ledger.generatereport');
});

//Admin Payment Setting

Route::prefix('admin/payment/')->group(function(){
	Route::get('add', [PaymentController::class, 'AddPayment'])->name('admin.payment.add');
	Route::get('show', [PaymentController::class, 'ShowPayment'])->name('admin.payment.show');
	Route::get('view/{id}', [PaymentController::class, 'viewPaymentById']);
	Route::get('delete/{id}', [PaymentController::class, 'deletePayment']);
	Route::get('print/{id}', [PaymentController::class, 'PrintPayment']);
	Route::get('edit/{id}', [PaymentController::class, 'editPayment']);
	Route::get('details/delete/{id}', [PaymentController::class, 'deletePaymentDetails']);
	Route::post('details/add', [PaymentController::class, 'Adddetails'])->name('admin.payment.details.add');
	Route::post('update/{id}', [PaymentController::class, 'updateDetails']);
	
});

//Admin Reciept Setting

Route::prefix('admin/reciept/')->group(function(){
	Route::get('add', [RecieptController::class, 'AddReciept'])->name('admin.reciept.add');
	Route::post('save', [RecieptController::class, 'saveReciept'])->name('admin.reciept.save');
	Route::get('show', [RecieptController::class, 'ShowReciept'])->name('admin.reciept.show');
	Route::get('delete/{id}', [RecieptController::class, 'deleteReciept']);
	Route::get('view/{id}', [RecieptController::class, 'viewRecieptById']);
	Route::get('print/{id}', [RecieptController::class, 'PrintReciept']);
	Route::get('edit/{id}', [RecieptController::class, 'editReciept']);
	Route::get('details/delete/{id}', [RecieptController::class, 'deleteRecieptDetails']);
	Route::post('details/add', [RecieptController::class, 'Adddetails'])->name('admin.reciept.details.add');
});

//Admin Balance Setting

Route::prefix('admin/balance/')->group(function(){
	Route::get('add', [BalanceController::class, 'AddBalance'])->name('admin.balance.add');
	Route::post('save', [BalanceController::class, 'saveBalance'])->name('admin.balance.store');
	Route::get('show', [BalanceController::class, 'ShowBalance'])->name('admin.balance.show');
	Route::get('edit/{id}', [BalanceController::class, 'editBalance']);
	Route::get('delete/{id}', [BalanceController::class, 'deleteBalance']);
	Route::post('update/{id}', [BalanceController::class, 'updateBalance']);
});

//Admin Stock Setting

Route::prefix('admin/stock/')->group(function(){
	Route::get('add', [StockController::class, 'AddStock'])->name('admin.stock.add');
	Route::get('out', [StockController::class, 'OutStock'])->name('admin.stock.out');
	Route::post('store', [StockController::class, 'StoreStock'])->name('admin.stock.store');
	Route::post('save', [StockController::class, 'StoreStockOut'])->name('admin.stockout.store');
	Route::get('edit-product/{id}', [StockController::class, 'editProduct']);
	Route::post('product-update/{id}', [StockController::class, 'updateProduct']);
	Route::get('product/add', [StockController::class, 'AddProduct'])->name('admin.stock.product.add');
	Route::post('product/save', [StockController::class, 'StoreProduct'])->name('admin.stock.product.store');
	Route::get('product/show', [StockController::class, 'ShowProduct'])->name('admin.stock.product.show');
	Route::get('view-record/{id}', [StockController::class, 'ShowProductRecord'])->name('admin.stock.view-record');
	Route::get('view-stock-in-out/{id}', [StockController::class, 'ShowProductInOutRecord'])->name('admin.stock.view-stock-in-out');
	Route::get('delete-product/{id}', [StockController::class, 'deleteProduct']);
});
//Admin Purchase Setting
Route::prefix('admin/purchase/')->group(function(){
	Route::get('add', 'App\Http\Controllers\Backend\PurchaseController@AddPurchase')->name('admin.purchase.add');
	Route::get('show', [PurchaseController::class, 'ShowPurchase'])->name('admin.purchase.show');
	Route::get('view/{id}', [PurchaseController::class, 'viewPurchaseById']);

	// Route::get('delete/{id}', [PaymentController::class, 'deletePayment']);
	// Route::get('print/{id}', [PaymentController::class, 'PrintPayment']);
	// Route::get('edit/{id}', [PaymentController::class, 'editPayment']);
	// Route::get('details/delete/{id}', [PaymentController::class, 'deletePaymentDetails']);
	// Route::post('details/add', [PaymentController::class, 'Adddetails'])->name('admin.payment.details.add');
	// Route::post('update/{id}', [PaymentController::class, 'updateDetails']);
	
});

//Admin Report Setting

Route::prefix('admin/report/')->group(function(){
	Route::get('show', [ReportController::class, 'showReport'])->name('admin.report.show');
});

// Route::post('admin/form/save', [PaymentController::class, 'saveRecord'])->name('admin.form.save');

Route::prefix('admin/form/save/')->group(function(){
	// Route::get('purchase', [PurchaseController::class,'saveRecord'])->name('admin.form.save.purchase');
	Route::post('purchase', [PurchaseController::class,'saveRecord'])->name('admin.form.save.purchase');

	// Route::get('show', [PaymentController::class, 'ShowPayment'])->name('admin.payment.show');
	Route::post('payment', [PaymentController::class, 'saveRecord'])->name('admin.form.save.payment');
	// Route::get('delete/{id}', [PaymentController::class, 'deletePayment']);
	// Route::get('print/{id}', [PaymentController::class, 'PrintPayment']);
	// Route::get('edit/{id}', [PaymentController::class, 'editPayment']);
	// Route::get('details/delete/{id}', [PaymentController::class, 'deletePaymentDetails']);
	// Route::post('details/add', [PaymentController::class, 'Adddetails'])->name('admin.payment.details.add');
	// Route::post('update/{id}', [PaymentController::class, 'updateDetails']);
	
});
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

