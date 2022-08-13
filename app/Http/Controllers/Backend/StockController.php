<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stockin;
use App\Models\Stockout;
use App\Models\Balance;
use App\Models\Product;
use Carbon\Carbon;
use DB;

class StockController extends Controller
{
     public function AddStock(){
        $products = Product::all();
        return view('backend.stock.add-stock',compact('products'));
    }

     public function OutStock(){
        $products = Product::all();
        return view('backend.stock.out-stock',compact('products'));
    }

    public function StoreStock(Request $request){
        $validateData = $request->validate([
            'product_id' => 'required',
            'details' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ],
        [
            'product_id.required' => 'Product Name is required',
            'details.required' => 'Details is required',
            'stock.required' => 'Stock Required',
            'price.required' => 'Price cannot be empty',
        ]);

       
        Stockin::insert([
        'product_id' => $request->product_id,
        'details' => $request->details,
        'stock' => $request->stock,
        'price' => $request->price,
        'created_at' => Carbon::now(),
   ]);

        $notification = array(
            'message' => 'Product Stock Added Successfully',
            'alert-type' => 'success',
        );
      return redirect()->back()->with($notification);
    }
       
     public function StoreStockOut(Request $request){
        $validateData = $request->validate([
            'product_id' => 'required',
            'stock' => 'required',
        ],
        [
            'product_id.required' => 'Product Name is required',
            'stock.required' => 'Stock Required',
        ]);

        $product_id = $request->product_id;
        $stock = $request->stock;

        $total_stock_in = Stockin::where('product_id',$product_id)->sum('stock');
        $total_stock_out = Stockout::where('product_id',$product_id)->sum('stock');
        $final_stock = $total_stock_in - $total_stock_out;

        if($stock > $final_stock){
            $notification = array(
            'message' => 'Dont Have Sufficient Stock. Check the stocks of the Product and try Again.',
            'alert-type' => 'warning',
        );
      return redirect()->back()->with($notification);
        }else{
            Stockout::insert([
        'product_id' => $request->product_id,
        'stock' => $request->stock,
        'created_at' => Carbon::now(),
   ]);

        $notification = array(
            'message' => 'Product Stock out Added Successfully',
            'alert-type' => 'success',
        );
      return redirect()->back()->with($notification);
        }
        
    }

    public function AddProduct(){
        return view('backend.stock.add-product');
    } 
    public function StoreProduct(Request $request){
        $validateData = $request->validate([
            'product_name' => 'required',
        ],
        [
            'product_name.required' => 'Product Name is required',
        ]);

        Product::insert([
        'product_name' => $request->product_name,
        'created_at' => Carbon::now(),
   ]);

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success',
        );
      return redirect()->back()->with($notification);
    }

    public function ShowProduct(){
        $products = Product::all();
        return view('backend.stock.show-product',compact('products'));
    }

     public function updateProduct(Request $request,$id){
        $validateData = $request->validate([
            'product_name' => 'required',
        ],
        [
            'product_name.required' => 'Balance is required',
        ]);

        Product::findOrFail($id)->update([
        'product_name' => $request->product_name,
   ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success',
        );
      return redirect()->route('admin.stock.product.show')->with($notification);
    }

    public function ShowProductRecord($id){
        $product = Stockin::where('product_id',$id)->get();
        $product_details = Product::findOrFail($id);
        $stock = $product->sum('stock');
        $price = $product->sum('price');

      

        $total_stock_in = Stockin::where('product_id',$id)->sum('stock');
        $total_stock_out = Stockout::where('product_id',$id)->sum('stock');
        $final_stock = $total_stock_in - $total_stock_out;


        return view('backend.stock.view-product-record',compact('product_details','final_stock','price'));
    }

    public Function ShowProductInOutRecord($id){
        $stocks = Stockin::where('product_id',$id)->get();
        $stockouts = Stockout::where('product_id',$id)->get();

        $total_stock = Stockin::where('product_id',$id)->sum('stock');
        $total_price = Stockin::where('product_id',$id)->sum('price');
        $total_stockout = Stockout::where('product_id',$id)->sum('stock');
        return view('backend.stock.view-product-inout',compact('stocks','stockouts','total_stock','total_price','total_stockout'));
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('backend.stock.edit-product',compact('product'));
    }

    public function deleteProduct($id){
            Stockin::where('product_id',$id)->delete();
            Stockout::where('product_id',$id)->delete();
            Product::findOrFail($id)->delete();

             $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'error',
            );
          return redirect()->back()->with($notification);
    }
}
