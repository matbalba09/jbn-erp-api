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
    const SUCCESSFULLY_GET_USER = 'Successfully get user';
    const SUCCESSFULLY_CREATED_USER = 'Successfully created user';
    const SUCCESSFULLY_UPDATED_USER = 'Successfully updated user';
    const SUCCESSFULLY_SET_ROLE = 'Successfully set role';
    const SUCCESSFULLY_GET_USER_ROLES = 'Successfully get all user with roles';
    const FAILED_TO_CREATE_USER = 'User already exists';

    //Roles
    const SUCCESSFULLY_GET_ALL_ROLES = 'Successfully get all roles';
    const SUCCESSFULLY_GET_ROLE = 'Successfully get role';
    const SUCCESSFULLY_CREATED_ROLE = 'Successfully created role';
    const SUCCESSFULLY_UPDATED_ROLE = 'Successfully updated role';

    //Customers
    const SUCCESSFULLY_GET_ALL_CUSTOMERS = 'Successfully get all customers';
    const SUCCESSFULLY_GET_CUSTOMER = 'Successfully get customer';
    const SUCCESSFULLY_CREATED_CUSTOMER = 'Successfully created customer';
    const SUCCESSFULLY_UPDATED_CUSTOMER = 'Successfully updated customer';
    const SUCCESSFULLY_DELETED_CUSTOMER = 'Successfully deleted customer';

    //Inventories
    const SUCCESSFULLY_GET_ALL_INVENTORIES = 'Successfully get all inventories';
    const SUCCESSFULLY_GET_INVENTORY = 'Successfully get inventory';
    const SUCCESSFULLY_CREATED_INVENTORY = 'Successfully created inventory';
    const SUCCESSFULLY_UPDATED_INVENTORY = 'Successfully updated inventory';
    const SUCCESSFULLY_DELETED_INVENTORY = 'Successfully deleted inventory';

    //InventoryTransactions
    const SUCCESSFULLY_GET_ALL_INVENTORY_TRANSACTIONS = 'Successfully get all inventory transactions';
    const SUCCESSFULLY_GET_INVENTORY_TRANSACTION = 'Successfully get inventory transaction';
    const SUCCESSFULLY_CREATED_INVENTORY_TRANSACTION = 'Successfully created inventory transaction';
    const SUCCESSFULLY_UPDATED_INVENTORY_TRANSACTION = 'Successfully updated inventory transaction';
    const SUCCESSFULLY_DELETED_INVENTORY_TRANSACTION = 'Successfully deleted inventory transaction';
    const SUCCESSFULLY_GET_INVENTORY_TRANSACTION_FILES = 'Successfully get all inventory transaction files';

    //Orders
    const SUCCESSFULLY_GET_ALL_ORDERS = 'Successfully get all orders';
    const SUCCESSFULLY_GET_ORDER = 'Successfully get order';
    const SUCCESSFULLY_CREATED_ORDER = 'Successfully created order';
    const SUCCESSFULLY_UPDATED_ORDER = 'Successfully updated order';
    const SUCCESSFULLY_DELETED_ORDER = 'Successfully deleted order';

    //OrderDetails
    const SUCCESSFULLY_GET_ALL_ORDER_DETAILS = 'Successfully get all order details';
    const SUCCESSFULLY_GET_ORDER_DETAIL = 'Successfully get order detail';
    const SUCCESSFULLY_CREATED_ORDER_DETAIL = 'Successfully created order detail';
    const SUCCESSFULLY_UPDATED_ORDER_DETAIL = 'Successfully updated order detail';
    const SUCCESSFULLY_DELETED_ORDER_DETAIL = 'Successfully deleted order detail';

    //Products
    const SUCCESSFULLY_GET_ALL_PRODUCTS = 'Successfully get all products';
    const SUCCESSFULLY_GET_PRODUCT = 'Successfully get product';
    const SUCCESSFULLY_CREATED_PRODUCT = 'Successfully created product';
    const SUCCESSFULLY_UPDATED_PRODUCT = 'Successfully updated product';
    const SUCCESSFULLY_DELETED_PRODUCT = 'Successfully deleted product';

    //PurchaseOrders
    const SUCCESSFULLY_GET_ALL_PO = 'Successfully get all purchase orders';
    const SUCCESSFULLY_GET_PO = 'Successfully get purchase order';
    const SUCCESSFULLY_CREATED_PO = 'Successfully created purchase order';
    const SUCCESSFULLY_UPDATED_PO = 'Successfully updated purchase order';
    const SUCCESSFULLY_DELETED_PO = 'Successfully deleted purchase order';

    //PurchaseOrderDetails
    const SUCCESSFULLY_GET_ALL_PO_DETAILS = 'Successfully get all purchase order details';
    const SUCCESSFULLY_GET_PO_DETAIL = 'Successfully get purchase order detail';
    const SUCCESSFULLY_CREATED_PO_DETAIL = 'Successfully created purchase order detail';
    const SUCCESSFULLY_UPDATED_PO_DETAIL = 'Successfully updated purchase order detail';
    const SUCCESSFULLY_DELETED_PO_DETAIL = 'Successfully deleted purchase order detail';

    //Prs
    const SUCCESSFULLY_GET_ALL_PRS = 'Successfully get all prs';
    const SUCCESSFULLY_GET_PRS = 'Successfully get prs';
    const SUCCESSFULLY_CREATED_PRS = 'Successfully created prs';
    const SUCCESSFULLY_UPDATED_PRS = 'Successfully updated prs';
    const SUCCESSFULLY_DELETED_PRS = 'Successfully deleted prs';

    //PrsDetails
    const SUCCESSFULLY_GET_ALL_PRS_DETAILS = 'Successfully get all prs details';
    const SUCCESSFULLY_GET_PRS_DETAIL = 'Successfully get prs detail';
    const SUCCESSFULLY_CREATED_PRS_DETAIL = 'Successfully created prs detail';
    const SUCCESSFULLY_UPDATED_PRS_DETAIL = 'Successfully updated prs detail';
    const SUCCESSFULLY_DELETED_PRS_DETAIL = 'Successfully deleted prs detail';

    //Quotations
    const SUCCESSFULLY_GET_ALL_QUOTATIONS = 'Successfully get all quotations';
    const SUCCESSFULLY_GET_QUOTATION = 'Successfully get quotation';
    const SUCCESSFULLY_CREATED_QUOTATION = 'Successfully created quotation';
    const SUCCESSFULLY_UPDATED_QUOTATION = 'Successfully updated quotation';
    const SUCCESSFULLY_DELETED_QUOTATION = 'Successfully deleted quotation';

    //QuotationDetails
    const SUCCESSFULLY_GET_ALL_QUOTATION_DETAILS = 'Successfully get all quotation details';
    const SUCCESSFULLY_GET_QUOTATION_DETAIL = 'Successfully get quotation detail';
    const SUCCESSFULLY_CREATED_QUOTATION_DETAIL = 'Successfully created quotation detail';
    const SUCCESSFULLY_UPDATED_QUOTATION_DETAIL = 'Successfully updated quotation detail';
    const SUCCESSFULLY_DELETED_QUOTATION_DETAIL = 'Successfully deleted quotation detail';
    
    //Suppliers
    const SUCCESSFULLY_GET_ALL_SUPPLIERS = 'Successfully get all suppliers';
    const SUCCESSFULLY_GET_SUPPLIER = 'Successfully get supplier';
    const SUCCESSFULLY_CREATED_SUPPLIER = 'Successfully created supplier';
    const SUCCESSFULLY_UPDATED_SUPPLIER = 'Successfully updated supplier';
    const SUCCESSFULLY_DELETED_SUPPLIER = 'Successfully deleted supplier';

    //Payments
    const SUCCESSFULLY_GET_ALL_PAYMENTS = 'Successfully get all payments';
    const SUCCESSFULLY_GET_PAYMENT = 'Successfully get payment';
    const SUCCESSFULLY_CREATED_PAYMENT = 'Successfully created payment';
    const SUCCESSFULLY_UPDATED_PAYMENT = 'Successfully updated payment';
    const SUCCESSFULLY_DELETED_PAYMENT = 'Successfully deleted payment';

    //ServiceType
    const SUCCESSFULLY_GET_ALL_SERVICE_TYPES = 'Successfully get all service types';
    const SUCCESSFULLY_GET_SERVICE_TYPE = 'Successfully get service type';
    const SUCCESSFULLY_CREATED_SERVICE_TYPE = 'Successfully created service type';
    const SUCCESSFULLY_UPDATED_SERVICE_TYPE = 'Successfully updated service type';
    const SUCCESSFULLY_DELETED_SERVICE_TYPE = 'Successfully deleted service type';

    //Category
    const SUCCESSFULLY_GET_ALL_CATEGORIES = 'Successfully get all categories';
    const SUCCESSFULLY_GET_CATEGORY = 'Successfully get category';
    const SUCCESSFULLY_CREATED_CATEGORY = 'Successfully created category';
    const SUCCESSFULLY_UPDATED_CATEGORY = 'Successfully updated category';
    const SUCCESSFULLY_DELETED_CATEGORY = 'Successfully deleted category';

    //ProductAttribute
    const SUCCESSFULLY_GET_ALL_PRODUCT_ATTRIBUTES = 'Successfully get all product attributes';
    const SUCCESSFULLY_GET_PRODUCT_ATTRIBUTE = 'Successfully get product attribute';
    const SUCCESSFULLY_CREATED_PRODUCT_ATTRIBUTE = 'Successfully created product attribute';
    const SUCCESSFULLY_UPDATED_PRODUCT_ATTRIBUTE = 'Successfully updated product attribute';
    const SUCCESSFULLY_DELETED_PRODUCT_ATTRIBUTE = 'Successfully deleted product attribute';

    //Attribute
    const SUCCESSFULLY_GET_ALL_ATTRIBUTES = 'Successfully get all attributes';
    const SUCCESSFULLY_GET_ATTRIBUTE = 'Successfully get attribute';
    const SUCCESSFULLY_CREATED_ATTRIBUTE = 'Successfully created attribute';
    const SUCCESSFULLY_UPDATED_ATTRIBUTE = 'Successfully updated attribute';
    const SUCCESSFULLY_DELETED_ATTRIBUTE = 'Successfully deleted attribute';
    
    const SUCCESSFULLY_GET_ALL_UNIQUE_ATTRIBUTE_NAMES = 'Successfully get all unique attribute names';

    //ProductCategory
    const SUCCESSFULLY_GET_ALL_PRODUCT_CATEGORIES = 'Successfully get all product categories';
    const SUCCESSFULLY_GET_PRODUCT_CATEGORY = 'Successfully get product category';
    const SUCCESSFULLY_CREATED_PRODUCT_CATEGORY = 'Successfully created product category';
    const SUCCESSFULLY_UPDATED_PRODUCT_CATEGORY = 'Successfully updated product category';
    const SUCCESSFULLY_DELETED_PRODUCT_CATEGORY = 'Successfully deleted product category';

    //PrsSupplier
    const SUCCESSFULLY_GET_ALL_PRS_SUPPLIERS = 'Successfully get all prs suppliers';
    const SUCCESSFULLY_GET_PRS_SUPPLIER = 'Successfully get prs supplier';
    const SUCCESSFULLY_CREATED_PRS_SUPPLIER = 'Successfully created prs supplier';
    const SUCCESSFULLY_UPDATED_PRS_SUPPLIER = 'Successfully updated prs supplier';
    const SUCCESSFULLY_DELETED_PRS_SUPPLIER = 'Successfully deleted prs supplier';

    //PrsSupplierType
    const SUCCESSFULLY_GET_ALL_PRS_SUPPLIER_TYPES = 'Successfully get all prs supplier types';
    const SUCCESSFULLY_GET_PRS_SUPPLIER_TYPE = 'Successfully get prs supplier type';
    const SUCCESSFULLY_CREATED_PRS_SUPPLIER_TYPE = 'Successfully created prs supplier type';
    const SUCCESSFULLY_UPDATED_PRS_SUPPLIER_TYPE = 'Successfully updated prs supplier type';
    const SUCCESSFULLY_DELETED_PRS_SUPPLIER_TYPE = 'Successfully deleted prs supplier type';

    //Bom
    const SUCCESSFULLY_GET_ALL_BOM = 'Successfully get all bom';
    const SUCCESSFULLY_GET_BOM = 'Successfully get bom';
    const SUCCESSFULLY_CREATED_BOM = 'Successfully created bom';
    const SUCCESSFULLY_UPDATED_BOM = 'Successfully updated bom';
    const SUCCESSFULLY_DELETED_BOM = 'Successfully deleted bom';

    //BomType
    const SUCCESSFULLY_GET_ALL_BOM_TYPES = 'Successfully get all bom types';
    const SUCCESSFULLY_GET_BOM_TYPE = 'Successfully get bom type';
    const SUCCESSFULLY_CREATED_BOM_TYPE = 'Successfully created bom type';
    const SUCCESSFULLY_UPDATED_BOM_TYPE = 'Successfully updated bom type';
    const SUCCESSFULLY_DELETED_BOM_TYPE = 'Successfully deleted bom type';

    //PrsSupplierItem
    const SUCCESSFULLY_GET_ALL_PRS_SUPPLIER_ITEMS = 'Successfully get all prs supplier items';
    const SUCCESSFULLY_GET_PRS_SUPPLIER_ITEM = 'Successfully get prs supplier item';
    const SUCCESSFULLY_CREATED_PRS_SUPPLIER_ITEM = 'Successfully created prs supplier item';
    const SUCCESSFULLY_UPDATED_PRS_SUPPLIER_ITEM = 'Successfully updated prs supplier item';
    const SUCCESSFULLY_DELETED_PRS_SUPPLIER_ITEM = 'Successfully deleted prs supplier item';
}