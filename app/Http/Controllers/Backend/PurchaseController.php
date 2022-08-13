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
        $this->validate($request,[
            'name' => 'required',
            'date' => 'required',
            'address' => 'required',
            'price' => 'required',
            'quantity_unit' => 'required',
            'quantity_type' => 'required',
        ]);

        $data = $request->only(['name', 'date', 'address', 'quantity_unit', 'quantity_type', 'price']);

        $purchase = Purchase::create($data);
        $notification = array(
            'message' => 'Purchase Added Successfully',
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

	public function ShowPurchase(){
    	$purchases = Purchase::orderBy('created_at', 'DESC')->get();
    	return view('backend.purchase.purchase_list',compact('purchases'));
    }


}
