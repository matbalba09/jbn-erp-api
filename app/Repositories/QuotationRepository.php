<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\QuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use Carbon\Carbon;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Response;

interface IQuotationRepository
{
    function getAll();
    function getById($id);
    function create(QuotationRequest $request);
    function update(QuotationRequest $request, $id);
    function delete($id);
}

class QuotationRepository implements IQuotationRepository
{
    function getAll()
    {
        $quotations = Quotation::with('quotation_details', 'prs')
            ->where('is_deleted', Response::FALSE)
            ->orderBy('created_at', 'desc')->get();
        return $quotations;
    }

    function getById($id)
    {
        $quotation = Quotation::with('quotation_details', 'prs')->findOrFail($id);
        return $quotation;
    }

    function create(QuotationRequest $request)
    {
        $latestQuotation = Quotation::latest()->first();
        $dateNow = Carbon::now()->format('ymd');

        $validatedData = $request->validated();

        if (!$latestQuotation) {
            $initialBase36 = Helper::decimalToBase36(1);
            $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $initialBase36;
        } else {
            $dateOfLatest = Helper::getFullDateFromNo($latestQuotation->quotation_no);
            if ($dateOfLatest != $dateNow) {
                $initialBase36 = Helper::decimalToBase36(1);
                $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $initialBase36;
            } else {
                $base36 = Helper::getLastPart($latestQuotation->quotation_no);
                $decimal = Helper::base36ToDecimal($base36) + 1;
                $backToBase36 = Helper::decimalToBase36($decimal);
                $validatedData['quotation_no'] = 'QUO' . $dateNow . '-SR-' . $backToBase36;
            }
        }
        $validatedData['is_deleted'] = Response::FALSE;

        $quotation = Quotation::create($validatedData);

        $quotationDetails = $request->input('quotation_details');
        if ($quotationDetails) {
            foreach ($quotationDetails as $detail) {
                QuotationDetail::create([
                    'quotation_no' => $quotation->quotation_no,
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'name' => isset($detail['name']) ? $detail['name'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
            }
        }
        return $quotation->load(['quotation_details']);
    }

    function update(QuotationRequest $request, $id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->status = $request->input('status');
        $quotation->save();

        $allQuotationDetails = QuotationDetail::where('quotation_no', $quotation->quotation_no)->get();

        foreach ($allQuotationDetails as $quotationDetail) {
            $quotationDetail->delete();
        }

        $quotationDetails = $request->input('quotation_details');
        if ($quotationDetails) {
            foreach ($quotationDetails as $detail) {
                
                $quotationDetailData = new QuotationDetail();
                $quotationDetailData->fill([
                    'quotation_no' => $quotation->quotation_no,
                    'product_id' => isset($detail['product_id']) ? $detail['product_id'] : null,
                    'name' => isset($detail['name']) ? $detail['name'] : null,
                    'uom' => isset($detail['uom']) ? $detail['uom'] : null,
                    'quantity' => isset($detail['quantity']) ? $detail['quantity'] : null,
                    'unit_price' => isset($detail['unit_price']) ? $detail['unit_price'] : null,
                    'total_price' => isset($detail['total_price']) ? $detail['total_price'] : null,
                    'is_deleted' => Response::FALSE,
                ]);
                $quotationDetailData->save();
            }
        }
        return $quotation->load(['quotation_details']);
    }

    function delete($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return $quotation;
    }
}
