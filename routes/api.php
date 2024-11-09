<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\BomTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FinancePoController;
use App\Http\Controllers\FinanceSoController;
use App\Http\Controllers\HeartbeatController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryJoController;
use App\Http\Controllers\InventoryPoController;
use App\Http\Controllers\InventoryTransactionController;
use App\Http\Controllers\JoController;
use App\Http\Controllers\JoDetailController;
use App\Http\Controllers\LaborCostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductAttributeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrsSupplierController;
use App\Http\Controllers\PrsSupplierItemController;
use App\Http\Controllers\PrsSupplierTypeController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\PoDetailController;
use App\Http\Controllers\PrintTypeController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProductionDetailController;
use App\Http\Controllers\ProductionJoController;
use App\Http\Controllers\ProductLaborCostController;
use App\Http\Controllers\PrsController;
use App\Http\Controllers\PrsDetailController;
use App\Http\Controllers\PrsV2Controller;
use App\Http\Controllers\PurchasePoController;
use App\Http\Controllers\PurchasePrsController;
use App\Http\Controllers\QualityPoController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuotationDetailController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesPrsController;
use App\Http\Controllers\SalesQuotationController;
use App\Http\Controllers\SalesSoController;
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

        Route::get('getFiles/{id}', [InventoryTransactionController::class, 'getFiles']);
    });
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('{id}', [OrderController::class, 'getById']);
        Route::post('create', [OrderController::class, 'create']);
        Route::put('update/{id}', [OrderController::class, 'update']);
        Route::delete('delete/{id}', [OrderController::class, 'delete']);

        Route::get('getPrsSupplierByOrderId/{id}', [OrderController::class, 'getPrsSupplierByOrderId']);
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
    Route::prefix('po')->group(function () {
        Route::get('/', [PoController::class, 'index']);
        Route::get('{id}', [PoController::class, 'getById']);
        Route::post('create', [PoController::class, 'create']);
        Route::put('update/{id}', [PoController::class, 'update']);
        Route::delete('delete/{id}', [PoController::class, 'delete']);
    });
    Route::prefix('po_detail')->group(function () {
        Route::get('/', [PoDetailController::class, 'index']);
        Route::get('{id}', [PoDetailController::class, 'getById']);
        Route::post('create', [PoDetailController::class, 'create']);
        Route::put('update/{id}', [PoDetailController::class, 'update']);
        Route::delete('delete/{id}', [PoDetailController::class, 'delete']);
    });
    Route::prefix('prs')->group(function () {
        Route::get('/', [PrsController::class, 'index']);
        Route::get('{id}', [PrsController::class, 'getById']);
        Route::post('create', [PrsController::class, 'create']);
        Route::put('update/{id}', [PrsController::class, 'update']);
        Route::delete('delete/{id}', [PrsController::class, 'delete']);
    });
    Route::prefix('prs_detail')->group(function () {
        Route::get('/', [PrsDetailController::class, 'index']);
        Route::get('{id}', [PrsDetailController::class, 'getById']);
        Route::post('create', [PrsDetailController::class, 'create']);
        Route::put('update/{id}', [PrsDetailController::class, 'update']);
        Route::delete('delete/{id}', [PrsDetailController::class, 'delete']);
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
    Route::prefix('attribute')->group(function () {
        Route::get('/', [AttributeController::class, 'index']);
        Route::get('getAllUniqueAttributeName', [AttributeController::class, 'getAllUniqueAttributeName']);
        Route::get('{id}', [AttributeController::class, 'getById']);
        Route::post('create', [AttributeController::class, 'create']);
        Route::put('update/{id}', [AttributeController::class, 'update']);
        Route::delete('delete/{id}', [AttributeController::class, 'delete']);

    });
    Route::prefix('product_category')->group(function () {
        Route::get('/', [ProductCategoryController::class, 'index']);
        Route::get('{id}', [ProductCategoryController::class, 'getById']);
        Route::post('create', [ProductCategoryController::class, 'create']);
        Route::put('update/{id}', [ProductCategoryController::class, 'update']);
        Route::delete('delete/{id}', [ProductCategoryController::class, 'delete']);
    });
    Route::prefix('prs_supplier')->group(function () {
        Route::get('/', [PrsSupplierController::class, 'index']);
        Route::get('{id}', [PrsSupplierController::class, 'getById']);
        Route::post('create', [PrsSupplierController::class, 'create']);
        Route::put('update/{id}', [PrsSupplierController::class, 'update']);
        Route::delete('delete/{id}', [PrsSupplierController::class, 'delete']);
    });
    Route::prefix('prs_supplier_type')->group(function () {
        Route::get('/', [PrsSupplierTypeController::class, 'index']);
        Route::get('{id}', [PrsSupplierTypeController::class, 'getById']);
        Route::post('create', [PrsSupplierTypeController::class, 'create']);
        Route::put('update/{id}', [PrsSupplierTypeController::class, 'update']);
        Route::delete('delete/{id}', [PrsSupplierTypeController::class, 'delete']);
    });
    Route::prefix('bom')->group(function () {
        Route::get('/', [BomController::class, 'index']);
        Route::get('{id}', [BomController::class, 'getById']);
        Route::post('create', [BomController::class, 'create']);
        Route::put('update/{id}', [BomController::class, 'update']);
        Route::delete('delete/{id}', [BomController::class, 'delete']);

        Route::get('getAllBomByProductId/{product_id}', [BomController::class, 'getAllBomByProductId']);
    });
    Route::prefix('bom_type')->group(function () {
        Route::get('/', [BomTypeController::class, 'index']);
        Route::get('{id}', [BomTypeController::class, 'getById']);
        Route::post('create', [BomTypeController::class, 'create']);
        Route::put('update/{id}', [BomTypeController::class, 'update']);
        Route::delete('delete/{id}', [BomTypeController::class, 'delete']);
    });
    Route::prefix('prs_supplier_item')->group(function () {
        Route::get('/', [PrsSupplierItemController::class, 'index']);
        Route::get('{id}', [PrsSupplierItemController::class, 'getById']);
        Route::post('create', [PrsSupplierItemController::class, 'create']);
        Route::put('update/{id}', [PrsSupplierItemController::class, 'update']);
        Route::delete('delete/{id}', [PrsSupplierItemController::class, 'delete']);
    });
    Route::prefix('prs_v2')->group(function () {
        Route::get('/', [PrsV2Controller::class, 'index']);
        Route::get('{id}', [PrsV2Controller::class, 'getById']);
        Route::post('create', [PrsV2Controller::class, 'create']);
        Route::put('update/{id}', [PrsV2Controller::class, 'update']);
        Route::delete('delete/{id}', [PrsV2Controller::class, 'delete']);
    });

    //PHASE 3
    
    Route::prefix('finance_po')->group(function () {
        Route::get('/', [FinancePoController::class, 'index']);
        Route::get('{id}', [FinancePoController::class, 'getById']);
        Route::post('create', [FinancePoController::class, 'create']);
        Route::put('update/{id}', [FinancePoController::class, 'update']);
        Route::delete('delete/{id}', [FinancePoController::class, 'delete']);
    });

    Route::prefix('finance_so')->group(function () {
        Route::get('/', [FinanceSoController::class, 'index']);
        Route::get('{id}', [FinanceSoController::class, 'getById']);
        Route::post('create', [FinanceSoController::class, 'create']);
        Route::put('update/{id}', [FinanceSoController::class, 'update']);
        Route::delete('delete/{id}', [FinanceSoController::class, 'delete']);
    });

    Route::prefix('inventory_jo')->group(function () {
        Route::get('/', [InventoryJoController::class, 'index']);
        Route::get('{id}', [InventoryJoController::class, 'getById']);
        Route::post('create', [InventoryJoController::class, 'create']);
        Route::put('update/{id}', [InventoryJoController::class, 'update']);
        Route::delete('delete/{id}', [InventoryJoController::class, 'delete']);
    });

    Route::prefix('inventory_po')->group(function () {
        Route::get('/', [InventoryPoController::class, 'index']);
        Route::get('{id}', [InventoryPoController::class, 'getById']);
        Route::post('create', [InventoryPoController::class, 'create']);
        Route::put('update/{id}', [InventoryPoController::class, 'update']);
        Route::delete('delete/{id}', [InventoryPoController::class, 'delete']);
    });

    Route::prefix('jo')->group(function () {
        Route::get('/', [JoController::class, 'index']);
        Route::get('{id}', [JoController::class, 'getById']);
        Route::post('create', [JoController::class, 'create']);
        Route::put('update/{id}', [JoController::class, 'update']);
        Route::delete('delete/{id}', [JoController::class, 'delete']);
    });

    Route::prefix('jo_detail')->group(function () {
        Route::get('/', [JoDetailController::class, 'index']);
        Route::get('{id}', [JoDetailController::class, 'getById']);
        Route::post('create', [JoDetailController::class, 'create']);
        Route::put('update/{id}', [JoDetailController::class, 'update']);
        Route::delete('delete/{id}', [JoDetailController::class, 'delete']);
    });

    Route::prefix('production')->group(function () {
        Route::get('/', [ProductionController::class, 'index']);
        Route::get('{id}', [ProductionController::class, 'getById']);
        Route::post('create', [ProductionController::class, 'create']);
        Route::put('update/{id}', [ProductionController::class, 'update']);
        Route::delete('delete/{id}', [ProductionController::class, 'delete']);
    });

    Route::prefix('production_detail')->group(function () {
        Route::get('/', [ProductionDetailController::class, 'index']);
        Route::get('{id}', [ProductionDetailController::class, 'getById']);
        Route::post('create', [ProductionDetailController::class, 'create']);
        Route::put('update/{id}', [ProductionDetailController::class, 'update']);
        Route::delete('delete/{id}', [ProductionDetailController::class, 'delete']);
    });

    Route::prefix('production_jo')->group(function () {
        Route::get('/', [ProductionJoController::class, 'index']);
        Route::get('{id}', [ProductionJoController::class, 'getById']);
        Route::post('create', [ProductionJoController::class, 'create']);
        Route::put('update/{id}', [ProductionJoController::class, 'update']);
        Route::delete('delete/{id}', [ProductionJoController::class, 'delete']);
    });

    Route::prefix('purchase_po')->group(function () {
        Route::get('/', [PurchasePoController::class, 'index']);
        Route::get('{id}', [PurchasePoController::class, 'getById']);
        Route::post('create', [PurchasePoController::class, 'create']);
        Route::put('update/{id}', [PurchasePoController::class, 'update']);
        Route::delete('delete/{id}', [PurchasePoController::class, 'delete']);
    });

    Route::prefix('purchase_prs')->group(function () {
        Route::get('/', [PurchasePrsController::class, 'index']);
        Route::get('{id}', [PurchasePrsController::class, 'getById']);
        Route::post('create', [PurchasePrsController::class, 'create']);
        Route::put('update/{id}', [PurchasePrsController::class, 'update']);
        Route::delete('delete/{id}', [PurchasePrsController::class, 'delete']);
    });

    Route::prefix('quality_po')->group(function () {
        Route::get('/', [QualityPoController::class, 'index']);
        Route::get('{id}', [QualityPoController::class, 'getById']);
        Route::post('create', [QualityPoController::class, 'create']);
        Route::put('update/{id}', [QualityPoController::class, 'update']);
        Route::delete('delete/{id}', [QualityPoController::class, 'delete']);
    });

    Route::prefix('sales_prs')->group(function () {
        Route::get('/', [SalesPrsController::class, 'index']);
        Route::get('{id}', [SalesPrsController::class, 'getById']);
        Route::post('create', [SalesPrsController::class, 'create']);
        Route::put('update/{id}', [SalesPrsController::class, 'update']);
        Route::delete('delete/{id}', [SalesPrsController::class, 'delete']);
    });

    Route::prefix('sales_quotation')->group(function () {
        Route::get('/', [SalesQuotationController::class, 'index']);
        Route::get('{id}', [SalesQuotationController::class, 'getById']);
        Route::post('create', [SalesQuotationController::class, 'create']);
        Route::put('update/{id}', [SalesQuotationController::class, 'update']);
        Route::delete('delete/{id}', [SalesQuotationController::class, 'delete']);
    });

    Route::prefix('sales_so')->group(function () {
        Route::get('/', [SalesSoController::class, 'index']);
        Route::get('{id}', [SalesSoController::class, 'getById']);
        Route::post('create', [SalesSoController::class, 'create']);
        Route::put('update/{id}', [SalesSoController::class, 'update']);
        Route::delete('delete/{id}', [SalesSoController::class, 'delete']);
    });

    Route::prefix('labor_cost')->group(function () {
        Route::get('/', [LaborCostController::class, 'index']);
        Route::get('{id}', [LaborCostController::class, 'getById']);
        Route::post('create', [LaborCostController::class, 'create']);
        Route::put('update/{id}', [LaborCostController::class, 'update']);
        Route::delete('delete/{id}', [LaborCostController::class, 'delete']);
    });

    Route::prefix('product_labor_cost')->group(function () {
        Route::get('/', [ProductLaborCostController::class, 'index']);
        Route::get('{id}', [ProductLaborCostController::class, 'getById']);
        Route::post('create', [ProductLaborCostController::class, 'create']);
        Route::put('update/{id}', [ProductLaborCostController::class, 'update']);
        Route::delete('delete/{id}', [ProductLaborCostController::class, 'delete']);
    });

    Route::prefix('raw_material')->group(function () {
        Route::get('/', [RawMaterialController::class, 'index']);
        Route::get('{id}', [RawMaterialController::class, 'getById']);
        Route::post('create', [RawMaterialController::class, 'create']);
        Route::put('update/{id}', [RawMaterialController::class, 'update']);
        Route::delete('delete/{id}', [RawMaterialController::class, 'delete']);

        Route::post('getByMakerMaterialColorSize', [RawMaterialController::class, 'getByMakerMaterialColorSize']);
    });
    
    Route::prefix('checklist')->group(function () {
        Route::get('/', [ChecklistController::class, 'index']);
        Route::get('{id}', [ChecklistController::class, 'getById']);
        Route::post('create', [ChecklistController::class, 'create']);
        Route::put('update/{id}', [ChecklistController::class, 'update']);
        Route::delete('delete/{id}', [ChecklistController::class, 'delete']);
    });

    Route::prefix('print_type')->group(function () {
        Route::get('/', [PrintTypeController::class, 'index']);
        Route::get('{id}', [PrintTypeController::class, 'getById']);
        Route::post('create', [PrintTypeController::class, 'create']);
        Route::put('update/{id}', [PrintTypeController::class, 'update']);
        Route::delete('delete/{id}', [PrintTypeController::class, 'delete']);

        Route::post('getByPrintSize', [PrintTypeController::class, 'getByPrintSize']);
    });



    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});
