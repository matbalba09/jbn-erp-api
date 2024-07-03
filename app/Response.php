<?php

namespace App;

class Response
{
    const HTTP_SUCCESS = 200;
    const HTTP_SUCCESS_POST = 201;
    const HTTP_SUCCESS_NO_RETURN = 204;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_CONFLICT = 409;
    const HTTP_NOT_PROCESSABLE = 422;
    const HTTP_UNAUTHORIZED = 401;

    const SUCCESS = 'Success';
    const FAIL = 'Failure';

    const TRUE = 1;
    const FALSE = 0;

    const MALE = 1;
    const FEMALE = 2;
    const MALE_STRING = "MALE";
    const FEMALE_STRING = "FEMALE";

    const IS_REQUIRED = 'is required';
    const IS_A_STRING = 'must be a string';
    const IS_A_NUMBER = 'must be a number';
    const IS_AN_EMAIL = 'must be an email';

    const INVALID_CREDENTIAL = 'Invalid Credentials';
    const INVALID_EMAIL = 'Email already exists';
    const SUCCESSFULLY_LOGGED_IN = 'Successfully Logged In';
    const INCORRECT_LOGIN_INPUT = 'Please input username';
    const USER_NOT_FOUND = 'User not found';
    const SUCCESSFULLY_GET_ALL_USERS = 'Successfully get all users';
    const SUCCESSFULLY_GET_USER = 'Successfully get all user';
    const SUCCESSFULLY_CREATED_USER = 'Successfully created user';
    const SUCCESSFULLY_UPDATED_USER = 'Successfully updated user';
    const SUCCESSFULLY_SET_ROLE = 'Successfully set role';
    const SUCCESSFULLY_GET_USER_ROLES = 'Successfully get all user with roles';
    const FAILED_TO_CREATE_USER = 'User already exists';

    //Roles
    const SUCCESSFULLY_GET_ALL_ROLES = 'Successfully get all roles';
    const SUCCESSFULLY_GET_ROLE = 'Successfully get all role';
    const SUCCESSFULLY_CREATED_ROLE = 'Successfully created role';
    const SUCCESSFULLY_UPDATED_ROLE = 'Successfully updated role';

    //Customers
    const SUCCESSFULLY_GET_ALL_CUSTOMERS = 'Successfully get all customers';
    const SUCCESSFULLY_GET_CUSTOMER = 'Successfully get all customer';
    const SUCCESSFULLY_CREATED_CUSTOMER = 'Successfully created customer';
    const SUCCESSFULLY_UPDATED_CUSTOMER = 'Successfully updated customer';
    const SUCCESSFULLY_DELETED_CUSTOMER = 'Successfully deleted customer';

    //Inventories
    const SUCCESSFULLY_GET_ALL_INVENTORIES = 'Successfully get all inventories';
    const SUCCESSFULLY_GET_INVENTORY = 'Successfully get all inventory';
    const SUCCESSFULLY_CREATED_INVENTORY = 'Successfully created inventory';
    const SUCCESSFULLY_UPDATED_INVENTORY = 'Successfully updated inventory';
    const SUCCESSFULLY_DELETED_INVENTORY = 'Successfully deleted inventory';

    //InventoryTransactions
    const SUCCESSFULLY_GET_ALL_INVENTORY_TRANSACTIONS = 'Successfully get all inventory transactions';
    const SUCCESSFULLY_GET_INVENTORY_TRANSACTION = 'Successfully get all inventory transaction';
    const SUCCESSFULLY_CREATED_INVENTORY_TRANSACTION = 'Successfully created inventory transaction';
    const SUCCESSFULLY_UPDATED_INVENTORY_TRANSACTION = 'Successfully updated inventory transaction';
    const SUCCESSFULLY_DELETED_INVENTORY_TRANSACTION = 'Successfully deleted inventory transaction';

    //Orders
    const SUCCESSFULLY_GET_ALL_ORDERS = 'Successfully get all orders';
    const SUCCESSFULLY_GET_ORDER = 'Successfully get all order';
    const SUCCESSFULLY_CREATED_ORDER = 'Successfully created order';
    const SUCCESSFULLY_UPDATED_ORDER = 'Successfully updated order';
    const SUCCESSFULLY_DELETED_ORDER = 'Successfully deleted order';

    //OrderDetails
    const SUCCESSFULLY_GET_ALL_ORDER_DETAILS = 'Successfully get all order details';
    const SUCCESSFULLY_GET_ORDER_DETAIL = 'Successfully get all order detail';
    const SUCCESSFULLY_CREATED_ORDER_DETAIL = 'Successfully created order detail';
    const SUCCESSFULLY_UPDATED_ORDER_DETAIL = 'Successfully updated order detail';
    const SUCCESSFULLY_DELETED_ORDER_DETAIL = 'Successfully deleted order detail';

    //Products
    const SUCCESSFULLY_GET_ALL_PRODUCTS = 'Successfully get all products';
    const SUCCESSFULLY_GET_PRODUCT = 'Successfully get all product';
    const SUCCESSFULLY_CREATED_PRODUCT = 'Successfully created product';
    const SUCCESSFULLY_UPDATED_PRODUCT = 'Successfully updated product';
    const SUCCESSFULLY_DELETED_PRODUCT = 'Successfully deleted product';

    //PurchaseOrders
    const SUCCESSFULLY_GET_ALL_PURCHASE_ORDERS = 'Successfully get all purchase orders';
    const SUCCESSFULLY_GET_PURCHASE_ORDER = 'Successfully get all purchase order';
    const SUCCESSFULLY_CREATED_PURCHASE_ORDER = 'Successfully created purchase order';
    const SUCCESSFULLY_UPDATED_PURCHASE_ORDER = 'Successfully updated purchase order';
    const SUCCESSFULLY_DELETED_PURCHASE_ORDER = 'Successfully deleted purchase order';

    //PurchaseRequisitions
    const SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITIONS = 'Successfully get all purchase requisitions';
    const SUCCESSFULLY_GET_PURCHASE_REQUISITION = 'Successfully get all purchase requisition';
    const SUCCESSFULLY_CREATED_PURCHASE_REQUISITION = 'Successfully created purchase requisition';
    const SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION = 'Successfully updated purchase requisition';
    const SUCCESSFULLY_DELETED_PURCHASE_REQUISITION = 'Successfully deleted purchase requisition';

    //PurchaseRequisitionDetails
    const SUCCESSFULLY_GET_ALL_PURCHASE_REQUISITION_DETAILS = 'Successfully get all purchase requisition details';
    const SUCCESSFULLY_GET_PURCHASE_REQUISITION_DETAIL = 'Successfully get all purchase requisition detail';
    const SUCCESSFULLY_CREATED_PURCHASE_REQUISITION_DETAIL = 'Successfully created purchase requisition detail';
    const SUCCESSFULLY_UPDATED_PURCHASE_REQUISITION_DETAIL = 'Successfully updated purchase requisition detail';
    const SUCCESSFULLY_DELETED_PURCHASE_REQUISITION_DETAIL = 'Successfully deleted purchase requisition detail';

    //Quotations
    const SUCCESSFULLY_GET_ALL_QUOTATIONS = 'Successfully get all quotations';
    const SUCCESSFULLY_GET_QUOTATION = 'Successfully get all quotation';
    const SUCCESSFULLY_CREATED_QUOTATION = 'Successfully created quotation';
    const SUCCESSFULLY_UPDATED_QUOTATION = 'Successfully updated quotation';
    const SUCCESSFULLY_DELETED_QUOTATION = 'Successfully deleted quotation';

    //QuotationDetails
    const SUCCESSFULLY_GET_ALL_QUOTATION_DETAILS = 'Successfully get all quotation details';
    const SUCCESSFULLY_GET_QUOTATION_DETAIL = 'Successfully get all quotation detail';
    const SUCCESSFULLY_CREATED_QUOTATION_DETAIL = 'Successfully created quotation detail';
    const SUCCESSFULLY_UPDATED_QUOTATION_DETAIL = 'Successfully updated quotation detail';
    const SUCCESSFULLY_DELETED_QUOTATION_DETAIL = 'Successfully deleted quotation detail';
    
    //Suppliers
    const SUCCESSFULLY_GET_ALL_SUPPLIERS = 'Successfully get all suppliers';
    const SUCCESSFULLY_GET_SUPPLIER = 'Successfully get all supplier';
    const SUCCESSFULLY_CREATED_SUPPLIER = 'Successfully created supplier';
    const SUCCESSFULLY_UPDATED_SUPPLIER = 'Successfully updated supplier';
    const SUCCESSFULLY_DELETED_SUPPLIER = 'Successfully deleted supplier';

    //Payments
    const SUCCESSFULLY_GET_ALL_PAYMENTS = 'Successfully get all payments';
    const SUCCESSFULLY_GET_PAYMENT = 'Successfully get all payment';
    const SUCCESSFULLY_CREATED_PAYMENT = 'Successfully created payment';
    const SUCCESSFULLY_UPDATED_PAYMENT = 'Successfully updated payment';
    const SUCCESSFULLY_DELETED_PAYMENT = 'Successfully deleted payment';

    //ServiceType
    const SUCCESSFULLY_GET_ALL_SERVICE_TYPES = 'Successfully get all service types';
    const SUCCESSFULLY_GET_SERVICE_TYPE = 'Successfully get all service type';
    const SUCCESSFULLY_CREATED_SERVICE_TYPE = 'Successfully created service type';
    const SUCCESSFULLY_UPDATED_SERVICE_TYPE = 'Successfully updated service type';
    const SUCCESSFULLY_DELETED_SERVICE_TYPE = 'Successfully deleted service type';

    //Category
    const SUCCESSFULLY_GET_ALL_CATEGORIES = 'Successfully get all categories';
    const SUCCESSFULLY_GET_CATEGORY = 'Successfully get all category';
    const SUCCESSFULLY_CREATED_CATEGORY = 'Successfully created category';
    const SUCCESSFULLY_UPDATED_CATEGORY = 'Successfully updated category';
    const SUCCESSFULLY_DELETED_CATEGORY = 'Successfully deleted category';

    //Category
    const SUCCESSFULLY_GET_ALL_PRODUCT_ATTRIBUTES = 'Successfully get all product attributes';
    const SUCCESSFULLY_GET_PRODUCT_ATTRIBUTE = 'Successfully get all product attribute';
    const SUCCESSFULLY_CREATED_PRODUCT_ATTRIBUTE = 'Successfully created product attribute';
    const SUCCESSFULLY_UPDATED_PRODUCT_ATTRIBUTE = 'Successfully updated product attribute';
    const SUCCESSFULLY_DELETED_PRODUCT_ATTRIBUTE = 'Successfully deleted product attribute';

    //ProductCategory
    const SUCCESSFULLY_GET_ALL_PRODUCT_CATEGORIES = 'Successfully get all product categories';
    const SUCCESSFULLY_GET_PRODUCT_CATEGORY = 'Successfully get all product category';
    const SUCCESSFULLY_CREATED_PRODUCT_CATEGORY = 'Successfully created product category';
    const SUCCESSFULLY_UPDATED_PRODUCT_CATEGORY = 'Successfully updated product category';
    const SUCCESSFULLY_DELETED_PRODUCT_CATEGORY = 'Successfully deleted product category';

    //PrsSupplier
    const SUCCESSFULLY_GET_ALL_PRS_SUPPLIERS = 'Successfully get all prs suppliers';
    const SUCCESSFULLY_GET_PRS_SUPPLIER = 'Successfully get all prs supplier';
    const SUCCESSFULLY_CREATED_PRS_SUPPLIER = 'Successfully created prs supplier';
    const SUCCESSFULLY_UPDATED_PRS_SUPPLIER = 'Successfully updated prs supplier';
    const SUCCESSFULLY_DELETED_PRS_SUPPLIER = 'Successfully deleted prs supplier';

    //PrsSupplierType
    const SUCCESSFULLY_GET_ALL_PRS_SUPPLIER_TYPES = 'Successfully get all prs supplier types';
    const SUCCESSFULLY_GET_PRS_SUPPLIER_TYPE = 'Successfully get all prs supplier type';
    const SUCCESSFULLY_CREATED_PRS_SUPPLIER_TYPE = 'Successfully created prs supplier type';
    const SUCCESSFULLY_UPDATED_PRS_SUPPLIER_TYPE = 'Successfully updated prs supplier type';
    const SUCCESSFULLY_DELETED_PRS_SUPPLIER_TYPE = 'Successfully deleted prs supplier type';

    //Bom
    const SUCCESSFULLY_GET_ALL_BOM = 'Successfully get all bom';
    const SUCCESSFULLY_GET_BOM = 'Successfully get all bom';
    const SUCCESSFULLY_CREATED_BOM = 'Successfully created bom';
    const SUCCESSFULLY_UPDATED_BOM = 'Successfully updated bom';
    const SUCCESSFULLY_DELETED_BOM = 'Successfully deleted bom';

    //BomType
    const SUCCESSFULLY_GET_ALL_BOM_TYPES = 'Successfully get all bom types';
    const SUCCESSFULLY_GET_BOM_TYPE = 'Successfully get all bom type';
    const SUCCESSFULLY_CREATED_BOM_TYPE = 'Successfully created bom type';
    const SUCCESSFULLY_UPDATED_BOM_TYPE = 'Successfully updated bom type';
    const SUCCESSFULLY_DELETED_BOM_TYPE = 'Successfully deleted bom type';
}