<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HeartbeatController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryTransactionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseRequisitionController;
use App\Http\Controllers\PurchaseRequisitionDetailController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceTypeController;
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

    Route::prefix('inventory_transaction')->group(function () {
        Route::get('/', [InventoryTransactionController::class, 'index']);
        Route::get('{id}', [InventoryTransactionController::class, 'getById']);
        Route::post('create', [InventoryTransactionController::class, 'create']);
        Route::put('update/{id}', [InventoryTransactionController::class, 'update']);
        Route::delete('delete/{id}', [InventoryTransactionController::class, 'delete']);
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

    Route::prefix('purchase_requisition')->group(function () {
        Route::get('/', [PurchaseRequisitionController::class, 'index']);
        Route::get('{id}', [PurchaseRequisitionController::class, 'getById']);
        Route::post('create', [PurchaseRequisitionController::class, 'create']);
        Route::put('update/{id}', [PurchaseRequisitionController::class, 'update']);
        Route::delete('delete/{id}', [PurchaseRequisitionController::class, 'delete']);
    });

    Route::prefix('purchase_requisition_detail')->group(function () {
        Route::get('/', [PurchaseRequisitionDetailController::class, 'index']);
        Route::get('{id}', [PurchaseRequisitionDetailController::class, 'getById']);
        Route::post('create', [PurchaseRequisitionDetailController::class, 'create']);
        Route::put('update/{id}', [PurchaseRequisitionDetailController::class, 'update']);
        Route::delete('delete/{id}', [PurchaseRequisitionDetailController::class, 'delete']);
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

    Route::prefix('payment')->group(function () {
        Route::get('/', [PaymentController::class, 'index']);
        Route::get('{id}', [PaymentController::class, 'getById']);
        Route::post('create', [PaymentController::class, 'create']);
        Route::put('update/{id}', [PaymentController::class, 'update']);
        Route::delete('delete/{id}', [PaymentController::class, 'delete']);
    });

    Route::prefix('service_type')->group(function () {
        Route::get('/', [ServiceTypeController::class, 'index']);
        Route::get('{id}', [ServiceTypeController::class, 'getById']);
        Route::post('create', [ServiceTypeController::class, 'create']);
        Route::put('update/{id}', [ServiceTypeController::class, 'update']);
        Route::delete('delete/{id}', [ServiceTypeController::class, 'delete']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('{id}', [CategoryController::class, 'getById']);
        Route::post('create', [CategoryController::class, 'create']);
        Route::put('update/{id}', [CategoryController::class, 'update']);
        Route::delete('delete/{id}', [CategoryController::class, 'delete']);
    });

    Route::prefix('product_attribute')->group(function () {
        Route::get('/', [ProductAttributeController::class, 'index']);
        Route::get('{id}', [ProductAttributeController::class, 'getById']);
        Route::post('create', [ProductAttributeController::class, 'create']);
        Route::put('update/{id}', [ProductAttributeController::class, 'update']);
        Route::delete('delete/{id}', [ProductAttributeController::class, 'delete']);
    });

    Route::prefix('product_category')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('{id}', [ProductCategoryController::class, 'getById']);
        Route::post('create', [ProductCategoryController::class, 'create']);
        Route::put('update/{id}', [ProductCategoryController::class, 'update']);
        Route::delete('delete/{id}', [ProductCategoryController::class, 'delete']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});
