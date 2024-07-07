<?php

namespace App\Providers;

use App\Repositories\BomRepository;
use App\Repositories\BomTypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\IBomRepository;
use App\Repositories\IBomTypeRepository;
use App\Repositories\ICategoryRepository;
use App\Repositories\ICustomerRepository;
use App\Repositories\IInventoryTransactionRepository;
use App\Repositories\IInventoryRepository;
use App\Repositories\IOrderDetailRepository;
use App\Repositories\IOrderRepository;
use App\Repositories\IPaymentRepository;
use App\Repositories\IProductAttributeRepository;
use App\Repositories\IProductCategoryRepository;
use App\Repositories\IProductRepository;
use App\Repositories\IPrsSupplierRepository;
use App\Repositories\IPrsSupplierTypeRepository;
use App\Repositories\IPurchaseOrderRepository;
use App\Repositories\IPurchaseRequisitionDetailRepository;
use App\Repositories\IPurchaseRequisitionRepository;
use App\Repositories\IQuotationDetailRepository;
use App\Repositories\IQuotationRepository;
use App\Repositories\IRoleRepository;
use App\Repositories\IServiceTypeRepository;
use App\Repositories\ISupplierRepository;
use App\Repositories\IUserRepository;
use App\Repositories\InventoryTransactionRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\IPrsSupplierItemRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductAttributeRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\PrsSupplierItemRepository;
use App\Repositories\PrsSupplierRepository;
use App\Repositories\PrsSupplierTypeRepository;
use App\Repositories\PurchaseOrderRepository;
use App\Repositories\PurchaseRequisitionDetailRepository;
use App\Repositories\PurchaseRequisitionRepository;
use App\Repositories\QuotationDetailRepository;
use App\Repositories\QuotationRepository;
use App\Repositories\RoleRepository;
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
            IPurchaseOrderRepository::class,
            PurchaseOrderRepository::class
        );
        $this->app->bind(
            IPurchaseRequisitionDetailRepository::class,
            PurchaseRequisitionDetailRepository::class
        );
        $this->app->bind(
            IPurchaseRequisitionRepository::class,
            PurchaseRequisitionRepository::class
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
