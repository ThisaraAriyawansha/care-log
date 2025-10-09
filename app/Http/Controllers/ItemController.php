<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Item;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Item_categorie;




class ItemController extends Controller
{
    public function item()
    {
        return view('item.item');
    }



    public function item_list(Request $request)
    {
        $search = $request->input('search');
    
        $query = Item::query();
    
        if ($search) {
            $query->whereRaw('LOWER(item_name) LIKE ?', ['%' . strtolower($search) . '%'])
                  ->orWhereRaw('LOWER(item_code) LIKE ?', ['%' . strtolower($search) . '%']);
        }
    
        $items = $query->paginate(5);
    
        return view('item.item_list', ['items' => $items, 'search' => $search]);
    }
    
    
    
    public function item_Add()
    {
        $categories=Item_categorie::all();
        return view('item.add_item', compact('categories'));
    }

    private function generateUniqueItemCode()
    {
        do {
            $code = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (Item::where('item_code', $code)->exists());

        return $code;
    }
     // Validate if the item code exists in the database
     public function validateItemCode($code)
    {
        $item = Item::where('item_code', $code)->first();

        if ($item) {
            return response()->json([
                'valid' => true,
                'item_code' => $item->item_code,
                'item_name' => $item->item_name,
                'quantity' => $item->quantity,
            ]);
        }

        return response()->json(['valid' => false]);
    }
    
    public function item_Insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'quantity' => 'required|integer',
            'minimum_qty' => 'required|integer',
            'quantity.required' => 'The Quantity must be an integer.',
            'minimum_qty.required' => 'The Minimum Qty must be an integer.',
        ]);
        

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422); // 422 Unprocessable Entity status code for validation errors
        }
        $save = new Item;

        $save->item_code = $this->generateUniqueItemCode(); // Auto-generate the item code
        $save->item_name = $request->item_name;
        $save->quantity = $request->quantity;
        $save->start_qty = $request->quantity;
        $save->minimum_qty = $request->minimum_qty;
        $save->status_id = 1;
        if (!empty($request->file('image_path'))) {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/item/', $filename);
            $save->image_path = $filename;
        }
        $save->item_category_id = $request->category_id;

        $save->save();
        return response()->json(['message' => 'Item created successfully!']);

    }

    //view for edit
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories=Item_categorie::all();
        return view('item.edit_item', compact('item', 'categories'));
    }

    public function update($id, Request $request)
    {
        $item = Item::getSingle($id);
        $item->item_name = trim($request->item_name);
        $item->quantity = trim($request->quantity);
        $item->minimum_qty = trim($request->minimum_qty);
        $item->item_category_id = $request->category_id ? trim($request->category_id) : null; // Allow NULL

        if (!empty($request->file('image_path'))) {
            // Check if the current image exists and is not the default image
            if (!empty($item->image_path) && $item->image_path !== 'default.png') {
                $imagePath = public_path('upload/item/' . $item->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Upload new image
            $file = $request->file('image_path');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/item/', $filename);
            $item->image_path = $filename;
        }
    
        // If no image was uploaded, set default image if it's null
        if (empty($item->image_path)) {
            $item->image_path = 'default.png';
        }
    
        $item->save();
    
        return redirect()->back()->with('success', 'Item successfully updated');
    }
    
    public function delete($id)
    {
        $item = Item::findOrFail($id);

        // If an image exists, delete it from the server
        if ($item->image_path && file_exists(public_path('upload/item/' . $item->image_path))) {
            unlink(public_path('upload/item/' . $item->image_path));
        }

        // Delete the item from the database
        $item->delete();

        return redirect('item/item_list')->with('success', "Item successfully delete");
    }



    public function toggleItemStatus($id)
    {
        try {
            $item = Item::findOrFail($id);
            
            // Toggle the status_id between 1 (Active) and 2 (Inactive)
            $item->status_id = $item->status_id == 1 ? 2 : 1;
            
            // Save the updated user
            $item->save();

            return response()->json(['status_id' => $item->status_id]);

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error toggling item status: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());

            // Return a JSON response with error information
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }
}