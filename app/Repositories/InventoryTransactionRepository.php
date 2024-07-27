<?php

namespace App\Repositories;

use App\Helper\Helper;
use App\Http\Requests\InventoryTransactionRequest;
use App\Models\Inventory;
use App\Models\InventoryTransaction;
use App\Response;
use Illuminate\Support\Facades\Storage;


interface IInventoryTransactionRepository
{
    function getAll();
    function getById($id);
    function create(InventoryTransactionRequest $request);
    function update(InventoryTransactionRequest $request, $id);
    function delete($id);
    function getFiles($id);
}

class InventoryTransactionRepository implements IInventoryTransactionRepository
{
    function getAll()
    {
        $inventoryTransactions = InventoryTransaction::where('is_deleted', Response::FALSE)->orderBy('created_at', 'desc')->get();
        return $inventoryTransactions;
    }

    function getById($id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        return $inventoryTransaction;
    }

    function create(InventoryTransactionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['is_deleted'] = Response::FALSE;

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $file_paths = [];
            $file_path_string = '';

            foreach ($files as $file) {
                $file_path = Storage::disk('shared_folder')->putFile("files", $file);
                $file_paths[] = $file_path;
                $file_path_string .= $file_path . ',';
            }
            $file_path_string = rtrim($file_path_string, ',');
            $validatedData['image'] = $file_path_string;
        }

        if ($request->hasFile('documents')) {
            $files = $request->file('documents');
            $file_paths = [];
            $file_path_string = '';

            foreach ($files as $file) {
                $file_path = Storage::disk('shared_folder')->putFile("files", $file);
                $file_paths[] = $file_path;
                $file_path_string .= $file_path . ',';
            }
            $file_path_string = rtrim($file_path_string, ',');
            $validatedData['documents'] = $file_path_string;
        }

        $inventoryTransaction = InventoryTransaction::create($validatedData);
        return $inventoryTransaction;
    }

    function update(InventoryTransactionRequest $request, $id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $file_paths = [];
            $file_path_string = '';
    
            if ($inventoryTransaction->image) {
                $file_path_string = $inventoryTransaction->image . ',';
            }
    
            foreach ($files as $file) {
                $file_path = Storage::disk('shared_folder')->putFile("files", $file);
                $file_paths[] = $file_path;
                $file_path_string .= $file_path . ',';
            }
            $file_path_string = rtrim($file_path_string, ',');
            $validatedData['image'] = $file_path_string;
        }

        if ($request->hasFile('documents')) {
            $files = $request->file('documents');
            $file_paths = [];
            $file_path_string = '';
    
            if ($inventoryTransaction->documents) {
                $file_path_string = $inventoryTransaction->documents . ',';
            }
    
            foreach ($files as $file) {
                $file_path = Storage::disk('shared_folder')->putFile("files", $file);
                $file_paths[] = $file_path;
                $file_path_string .= $file_path . ',';
            }
            $file_path_string = rtrim($file_path_string, ',');
            $validatedData['documents'] = $file_path_string;
        }
        
        $inventoryTransaction->update($validatedData);
        return $inventoryTransaction;
    }

    function delete($id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        $inventoryTransaction->delete();

        return $inventoryTransaction;
    }

    function getFiles($id)
    {
        $inventoryTransaction = InventoryTransaction::findOrFail($id);
        if ($inventoryTransaction->image) {
            $filePaths = explode(',', $inventoryTransaction->image);
            $base64Files = [];
            $disk = Storage::disk('shared_folder');

            foreach ($filePaths as $filePath) {
                if ($disk->exists($filePath)) {
                    $fileContent = $disk->get($filePath);
                    $base64File = base64_encode($fileContent);
                    $base64Files[] = $base64File;
                }
            }
            $result['image'] = $base64Files;
        } else {
            $result['image'] = null;
        }

        if ($inventoryTransaction->documents) {
            $filePaths = explode(',', $inventoryTransaction->documents);
            $base64Files = [];
            $disk = Storage::disk('shared_folder');

            foreach ($filePaths as $filePath) {
                if ($disk->exists($filePath)) {
                    $fileContent = $disk->get($filePath);
                    $base64File = base64_encode($fileContent);
                    $base64Files[] = $base64File;
                }
            }
            $result['documents'] = $base64Files;
        } else {
            $result['documents'] = null;
        }
        return $result;
    }
}
