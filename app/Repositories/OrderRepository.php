<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Response;

interface IOrderRepository
{
    function getAll();
    function getById($id);
    function create(OrderRequest $request);
    function update(OrderRequest $request, $id);
    function delete($id);

    function getPrsSupplierByOrderId($id);
}

class OrderRepository implements IOrderRepository
{
    function getAll()
    {
        $orders = Order::with('customer', 'payment_details', 'order_details.product', 'quotation.prs.prs_details.prs_suppliers')
            ->where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $orders;
    }

    function getById($id)
    {
        $order = Order::with('customer', 'payment_details', 'order_details.product', 'quotation.prs.prs_details.prs_suppliers')
            ->findOrFail($id);
        return $order;
    }

    function create(OrderRequest $request)
    {
        $latestOrder = Order::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestOrder) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestOrder->order_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestOrder->order_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['order_no'] = 'ORD' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;
        $order = Order::create($validatedData);

        $payments = $request->input('payment_details');
        if ($payments) {
            foreach ($payments as $detail) {
                Payment::create([
                    'order_no' => $order->order_no,
                    'issued_date' => isset($detail['issued_date']) ? $detail['issued_date'] : null,
                    'ref_no' => isset($detail['ref_no']) ? $detail['ref_no'] : null,
                    'paid_date' => isset($detail['paid_date']) ? $detail['paid_date'] : null,
                    'payment_method' => isset($detail['payment_method']) ? $detail['payment_method'] : null,
                    'amount' => isset($detail['amount']) ? $detail['amount'] : null,
                    'description' => isset($detail['description']) ? $detail['description'] : null,
                    'documents' => isset($detail['documents']) ? $detail['documents'] : null,
                    'status' => isset($detail['status']) ? $detail['status'] : null,
                    'check_no' => isset($detail['check_no']) ? $detail['check_no'] : null,
                    'bank_name' => isset($detail['bank_name']) ? $detail['bank_name'] : null,
                    'verified' => isset($detail['verified']) ? $detail['verified'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }
        $orderDetails = $request->input('order_details');
        if ($orderDetails) {
            foreach ($orderDetails as $detail) {
                OrderDetail::create([
                    'order_no' => $order->order_no,
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }
        return $order->load(['customer', 'payment_details', 'order_details.product', 'quotation.prs.prs_details.prs_suppliers']);
    }

    function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $validatedData = $request->validated();
        $order->update($validatedData);

        $allOrderDetails = OrderDetail::where('order_no', $order->order_no)->get();
        $allPayments = Payment::where('order_no', $order->order_no)->get();

        foreach ($allOrderDetails as $orderDetail) {
            $orderDetail->delete();
        }
        foreach ($allPayments as $payment) {
            $payment->delete();
        }
        
        $payments = $request->input('payment_details');
        if ($payments) {
            foreach ($payments as $detail) {
                Payment::create([
                    'order_no' => $order->order_no,
                    'issued_date' => isset($detail['issued_date']) ? $detail['issued_date'] : null,
                    'ref_no' => isset($detail['ref_no']) ? $detail['ref_no'] : null,
                    'paid_date' => isset($detail['paid_date']) ? $detail['paid_date'] : null,
                    'payment_method' => isset($detail['payment_method']) ? $detail['payment_method'] : null,
                    'amount' => isset($detail['amount']) ? $detail['amount'] : null,
                    'description' => isset($detail['description']) ? $detail['description'] : null,
                    'documents' => isset($detail['documents']) ? $detail['documents'] : null,
                    'status' => isset($detail['status']) ? $detail['status'] : null,
                    'check_no' => isset($detail['check_no']) ? $detail['check_no'] : null,
                    'bank_name' => isset($detail['bank_name']) ? $detail['bank_name'] : null,
                    'verified' => isset($detail['verified']) ? $detail['verified'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }

        $orderDetails = $request->input('order_details');
        if ($orderDetails) {
            foreach ($orderDetails as $detail) {
                $orderDetail = OrderDetail::create([
                    'order_no' => $order->order_no,
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'remarks' => isset($detail['remarks']) ? $detail['remarks'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }
        return $order->load(['customer', 'payment_details', 'order_details.product', 'quotation.prs.prs_details.prs_suppliers']);
    }

    function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $order;
    }

    function getPrsSupplierByOrderId($id)
    {
        $order = Order::with('quotation.prs.prs_details.prs_suppliers')
            ->findOrFail($id);

        $prsSuppliers = [];
        foreach ($order->quotation->prs->prs_details as $prsDetail) {
            $prsSuppliers[] = $prsDetail->prs_suppliers;
        }

        $prsSuppliers = collect($prsSuppliers)->flatten()->groupBy('supplier_id');

        return $prsSuppliers;
    }
}
