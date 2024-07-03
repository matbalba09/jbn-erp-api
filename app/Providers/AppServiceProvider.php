<?php

namespace App\Providers;

use App\Repositories\BomRepository;
use App\Repositories\BomTypeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\Interface\IBomRepository;
use App\Repositories\Interface\IBomTypeRepository;
use App\Repositories\Interface\ICategoryRepository;
use App\Repositories\Interface\ICustomerRepository;
use App\Repositories\Interface\IInventoryTransactionRepository;
use App\Repositories\Interface\IInventoryRepository;
use App\Repositories\Interface\IOrderDetailRepository;
use App\Repositories\Interface\IOrderRepository;
use App\Repositories\Interface\IPaymentRepository;
use App\Repositories\Interface\IProductAttributeRepository;
use App\Repositories\Interface\IProductCategoryRepository;
use App\Repositories\Interface\IProductRepository;
use App\Repositories\Interface\IPrsSupplierRepository;
use App\Repositories\Interface\IPrsSupplierTypeRepository;
use App\Repositories\Interface\IPurchaseOrderRepository;
use App\Repositories\Interface\IPurchaseRequisitionDetailRepository;
use App\Repositories\Interface\IPurchaseRequisitionRepository;
use App\Repositories\Interface\IQuotationDetailRepository;
use App\Repositories\Interface\IQuotationRepository;
use App\Repositories\Interface\IRoleRepository;
use App\Repositories\Interface\IServiceTypeRepository;
use App\Repositories\Interface\ISupplierRepository;
use App\Repositories\Interface\IUserRepository;
use App\Repositories\InventoryTransactionRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductAttributeRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
