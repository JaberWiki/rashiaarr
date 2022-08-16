<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Debit;
use App\Models\Ledger;
use App\Models\Product;
use App\Models\ProductUnits;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function AddPurchase()
    {

        $products = Product::all();
        $purchases = Purchase::all();
        $ledgers = Ledger::all();
        $product_units = ProductUnits::all();
        return view('backend.purchase.add-purchase', compact('products', 'purchases', 'ledgers', 'product_units'));
    }

    public function saveRecord(Request $request)
    {
        // validate the data
        $this->validate(
            $request,
            [
                'name' => 'required',
                'date' => 'required',
                'address' => 'required',
                'price' => 'required',
                'quantity_unit' => 'required',
                'quantity_type' => 'required',
            ],
            [
                'name.required' => 'Please enter name',
                'date.required' => 'Please enter date',
                'address.required' => 'Please enter address',
                'price.required' => 'Please enter price',
                'quantity_unit.required' => 'Please enter quantity unit',
                'quantity_type.required' => 'Please enter quantity type',
            ]
        );
        $data = $request->only(['name', 'date', 'address', 'quantity_unit', 'quantity_type', 'price']);
        $np=Product::where('product_name', $data['name'])->first();
        if (!$np) {
            $product['product_name'] = $data['name'];
            Product::create($product);
        }
        $npu=ProductUnits::where('unit_name', $data['quantity_type'])->first();
        if (!$npu) {
            $product_unit['unit_name'] = $data['quantity_type'];
            ProductUnits::create($product_unit);
        }
        $purchase = Purchase::create($data);
        $notification = array(
            'message' => 'Added Successfully',
            'alert-type' => 'success',
        );
        return redirect('/admin/purchase/view/' . $purchase->id)->with($notification);
    }


    public function viewPurchaseById($id)
    {
        $purchases = Purchase::findOrFail($id);
        // $debits = Debit::where('',$purchase->id)->get();
        return view('backend.purchase.view-purchase', compact('purchases'));
    }

    public function ShowPurchase()
    {
        $purchases = Purchase::orderBy('date', 'DESC')->get();
        return view('backend.purchase.purchase_list', compact('purchases'));
    }
}
