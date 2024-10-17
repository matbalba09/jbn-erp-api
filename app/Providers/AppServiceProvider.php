<?php

namespace App\Providers;

use App\Repositories\AttributeRepository;
use App\Repositories\BomRepository;
use App\Repositories\BomTypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ChecklistRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\FinancePoRepository;
use App\Repositories\FinanceSoRepository;
use App\Repositories\IAttributeRepository;
use App\Repositories\IBomRepository;
use App\Repositories\IBomTypeRepository;
use App\Repositories\ICategoryRepository;
use App\Repositories\IChecklistRepository;
use App\Repositories\ICustomerRepository;
use App\Repositories\IFinancePoRepository;
use App\Repositories\IFinanceSoRepository;
use App\Repositories\IInventoryJoRepository;
use App\Repositories\IInventoryPoRepository;
use App\Repositories\IInventoryTransactionRepository;
use App\Repositories\IInventoryRepository;
use App\Repositories\IJoDetailRepository;
use App\Repositories\IJoRepository;
use App\Repositories\ILaborCostRepository;
use App\Repositories\InventoryJoRepository;
use App\Repositories\InventoryPoRepository;
use App\Repositories\IOrderDetailRepository;
use App\Repositories\IOrderRepository;
use App\Repositories\IPaymentRepository;
use App\Repositories\IProductAttributeRepository;
use App\Repositories\IProductCategoryRepository;
use App\Repositories\IProductRepository;
use App\Repositories\IPrsSupplierRepository;
use App\Repositories\IPrsSupplierTypeRepository;
use App\Repositories\IPoRepository;
use App\Repositories\IPrsDetailRepository;
use App\Repositories\IPrsRepository;
use App\Repositories\IQuotationDetailRepository;
use App\Repositories\IQuotationRepository;
use App\Repositories\IRoleRepository;
use App\Repositories\IServiceTypeRepository;
use App\Repositories\ISupplierRepository;
use App\Repositories\IUserRepository;
use App\Repositories\InventoryTransactionRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\IPoDetailRepository;
use App\Repositories\IProductionDetailRepository;
use App\Repositories\IProductionJoRepository;
use App\Repositories\IProductionRepository;
use App\Repositories\IProductLaborCostRepository;
use App\Repositories\IPrsSupplierItemRepository;
use App\Repositories\IPurchasePoRepository;
use App\Repositories\IPurchasePrsRepository;
use App\Repositories\IQualityPoRepository;
use App\Repositories\IRawMaterialRepository;
use App\Repositories\ISalesPrsRepository;
use App\Repositories\ISalesQuotationRepository;
use App\Repositories\ISalesSoRepository;
use App\Repositories\JoDetailRepository;
use App\Repositories\JoRepository;
use App\Repositories\LaborCostRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\PoDetailRepository;
use App\Repositories\ProductAttributeRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PrsSupplierItemRepository;
use App\Repositories\PrsSupplierRepository;
use App\Repositories\PrsSupplierTypeRepository;
use App\Repositories\PoRepository;
use App\Repositories\ProductionDetailRepository;
use App\Repositories\ProductionJoRepository;
use App\Repositories\ProductionRepository;
use App\Repositories\ProductLaborCostRepository;
use App\Repositories\PrsDetailRepository;
use App\Repositories\PrsRepository;
use App\Repositories\PurchasePoRepository;
use App\Repositories\PurchasePrsRepository;
use App\Repositories\QualityPoRepository;
use App\Repositories\QuotationDetailRepository;
use App\Repositories\QuotationRepository;
use App\Repositories\RawMaterialRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SalesPrsRepository;
use App\Repositories\SalesQuotationRepository;
use App\Repositories\SalesSoRepository;
use App\Repositories\ServiceTypeRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            IRoleRepository::class,
            RoleRepository::class
        );
        $this->app->bind(
            ICustomerRepository::class,
            CustomerRepository::class
        );
        $this->app->bind(
            IInventoryTransactionRepository::class,
            InventoryTransactionRepository::class
        );
        $this->app->bind(
            IInventoryRepository::class,
            InventoryRepository::class
        );
        $this->app->bind(
            IOrderDetailRepository::class,
            OrderDetailRepository::class
        );
        $this->app->bind(
            IOrderRepository::class,
            OrderRepository::class
        );
        $this->app->bind(
            IProductRepository::class,
            ProductRepository::class
        );
        $this->app->bind(
            IPoRepository::class,
            PoRepository::class
        );
        $this->app->bind(
            IPoDetailRepository::class,
            PoDetailRepository::class
        );
        $this->app->bind(
            IPrsDetailRepository::class,
            PrsDetailRepository::class
        );
        $this->app->bind(
            IPrsRepository::class,
            PrsRepository::class
        );
        $this->app->bind(
            IQuotationDetailRepository::class,
            QuotationDetailRepository::class
        );
        $this->app->bind(
            IQuotationRepository::class,
            QuotationRepository::class
        );
        $this->app->bind(
            ISupplierRepository::class,
            SupplierRepository::class
        );
        $this->app->bind(
            IPaymentRepository::class,
            PaymentRepository::class
        );
        $this->app->bind(
            IServiceTypeRepository::class,
            ServiceTypeRepository::class
        );
        $this->app->bind(
            ICategoryRepository::class,
            CategoryRepository::class
        );
        $this->app->bind(
            IAttributeRepository::class,
            AttributeRepository::class
        );
        $this->app->bind(
            IProductAttributeRepository::class,
            ProductAttributeRepository::class
        );
        $this->app->bind(
            IProductCategoryRepository::class,
            ProductCategoryRepository::class
        );
        $this->app->bind(
            IPrsSupplierRepository::class,
            PrsSupplierRepository::class
        );
        $this->app->bind(
            IPrsSupplierTypeRepository::class,
            PrsSupplierTypeRepository::class
        );
        $this->app->bind(
            IBomRepository::class,
            BomRepository::class
        );
        $this->app->bind(
            IBomTypeRepository::class,
            BomTypeRepository::class
        );
        $this->app->bind(
            IPrsSupplierItemRepository::class,
            PrsSupplierItemRepository::class
        );
        //PHASE 3
        
        $this->app->bind(
            IFinancePoRepository::class,
            FinancePoRepository::class
        );
        $this->app->bind(
            IFinanceSoRepository::class,
            FinanceSoRepository::class
        );
        $this->app->bind(
            IInventoryJoRepository::class,
            InventoryJoRepository::class
        );
        $this->app->bind(
            IInventoryPoRepository::class,
            InventoryPoRepository::class
        );
        $this->app->bind(
            IJoDetailRepository::class,
            JoDetailRepository::class
        );
        $this->app->bind(
            IJoRepository::class,
            JoRepository::class
        );
        $this->app->bind(
            IProductionDetailRepository::class,
            ProductionDetailRepository::class
        );
        $this->app->bind(
            IProductionJoRepository::class,
            ProductionJoRepository::class
        );
        $this->app->bind(
            IProductionRepository::class,
            ProductionRepository::class
        );
        $this->app->bind(
            IPurchasePoRepository::class,
            PurchasePoRepository::class
        );
        $this->app->bind(
            IPurchasePrsRepository::class,
            PurchasePrsRepository::class
        );
        $this->app->bind(
            IQualityPoRepository::class,
            QualityPoRepository::class
        );
        $this->app->bind(
            ISalesPrsRepository::class,
            SalesPrsRepository::class
        );
        $this->app->bind(
            ISalesQuotationRepository::class,
            SalesQuotationRepository::class
        );
        $this->app->bind(
            ISalesSoRepository::class,
            SalesSoRepository::class
        );
        $this->app->bind(
            ILaborCostRepository::class,
            LaborCostRepository::class
        );
        $this->app->bind(
            IProductLaborCostRepository::class,
            ProductLaborCostRepository::class
        );
        $this->app->bind(
            IRawMaterialRepository::class,
            RawMaterialRepository::class
        );
        $this->app->bind(
            IChecklistRepository::class,
            ChecklistRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
