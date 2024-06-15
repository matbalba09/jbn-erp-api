<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HeartbeatController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryDetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseRequisitionSlipController;
use App\Http\Controllers\PurchaseRequisitionSlipDetailController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

    Route::get('Heartbeat', [HeartbeatController::class, 'Heartbeat']);
    Route::post('login', [UserController::class, 'login']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('{id}', [UserController::class, 'getById']);
        Route::post('create', [UserController::class, 'create']);
        Route::put('update/{id}', [UserController::class, 'update']);

        Route::post('setUserRoles', [UserController::class, 'setUserRoles']);
        Route::get('getUserRoles/{id}', [UserController::class, 'getUserRoles']);
    });

    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('{id}', [RoleController::class, 'getById']);
        Route::post('create', [RoleController::class, 'create']);
        Route::put('update/{id}', [RoleController::class, 'update']);
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index']);
        Route::get('{id}', [CustomerController::class, 'getById']);
        Route::post('create', [CustomerController::class, 'create']);
        Route::put('update/{id}', [CustomerController::class, 'update']);
        Route::delete('delete/{id}', [CustomerController::class, 'delete']);
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/', [InventoryController::class, 'index']);
        Route::get('{id}', [InventoryController::class, 'getById']);
        Route::post('create', [InventoryController::class, 'create']);
        Route::put('update/{id}', [InventoryController::class, 'update']);
        Route::delete('delete/{id}', [InventoryController::class, 'delete']);
    });

    Route::prefix('inventory_detail')->group(function () {
        Route::get('/', [InventoryDetailController::class, 'index']);
        Route::get('{id}', [InventoryDetailController::class, 'getById']);
        Route::post('create', [InventoryDetailController::class, 'create']);
        Route::put('update/{id}', [InventoryDetailController::class, 'update']);
        Route::delete('delete/{id}', [InventoryDetailController::class, 'delete']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('{id}', [OrderController::class, 'getById']);
        Route::post('create', [OrderController::class, 'create']);
        Route::put('update/{id}', [OrderController::class, 'update']);
        Route::delete('delete/{id}', [OrderController::class, 'delete']);
    });

    Route::prefix('order_detail')->group(function () {
        Route::get('/', [OrderDetailController::class, 'index']);
        Route::get('{id}', [OrderDetailController::class, 'getById']);
        Route::post('create', [OrderDetailController::class, 'create']);
        Route::put('update/{id}', [OrderDetailController::class, 'update']);
        Route::delete('delete/{id}', [OrderDetailController::class, 'delete']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('{id}', [ProductController::class, 'getById']);
        Route::post('create', [ProductController::class, 'create']);
        Route::put('update/{id}', [ProductController::class, 'update']);
        Route::delete('delete/{id}', [ProductController::class, 'delete']);
    });

    Route::prefix('purchase_order')->group(function () {
        Route::get('/', [PurchaseOrderController::class, 'index']);
        Route::get('{id}', [PurchaseOrderController::class, 'getById']);
        Route::post('create', [PurchaseOrderController::class, 'create']);
        Route::put('update/{id}', [PurchaseOrderController::class, 'update']);
        Route::delete('delete/{id}', [PurchaseOrderController::class, 'delete']);
    });

    Route::prefix('purchase_requisition_slip')->group(function () {
        Route::get('/', [PurchaseRequisitionSlipController::class, 'index']);
        Route::get('{id}', [PurchaseRequisitionSlipController::class, 'getById']);
        Route::post('create', [PurchaseRequisitionSlipController::class, 'create']);
        Route::put('update/{id}', [PurchaseRequisitionSlipController::class, 'update']);
        Route::delete('delete/{id}', [PurchaseRequisitionSlipController::class, 'delete']);
    });

    Route::prefix('purchase_requisition_slip_detail')->group(function () {
        Route::get('/', [PurchaseRequisitionSlipDetailController::class, 'index']);
        Route::get('{id}', [PurchaseRequisitionSlipDetailController::class, 'getById']);
        Route::post('create', [PurchaseRequisitionSlipDetailController::class, 'create']);
        Route::put('update/{id}', [PurchaseRequisitionSlipDetailController::class, 'update']);
        Route::delete('delete/{id}', [PurchaseRequisitionSlipDetailController::class, 'delete']);
    });

    Route::prefix('quotation')->group(function () {
        Route::get('/', [QuotationController::class, 'index']);
        Route::get('{id}', [QuotationController::class, 'getById']);
        Route::post('create', [QuotationController::class, 'create']);
        Route::put('update/{id}', [QuotationController::class, 'update']);
        Route::delete('delete/{id}', [QuotationController::class, 'delete']);
    });

    Route::prefix('quotation_detail')->group(function () {
        Route::get('/', [QuotationDetailController::class, 'index']);
        Route::get('{id}', [QuotationDetailController::class, 'getById']);
        Route::post('create', [QuotationDetailController::class, 'create']);
        Route::put('update/{id}', [QuotationDetailController::class, 'update']);
        Route::delete('delete/{id}', [QuotationDetailController::class, 'delete']);
    });

    Route::prefix('supplier')->group(function () {
        Route::get('/', [SupplierController::class, 'index']);
        Route::get('{id}', [SupplierController::class, 'getById']);
        Route::post('create', [SupplierController::class, 'create']);
        Route::put('update/{id}', [SupplierController::class, 'update']);
        Route::delete('delete/{id}', [SupplierController::class, 'delete']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});
