<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use Carbon\Carbon;

class BalanceController extends Controller
{
    public function AddBalance(){
        return view('backend.balance.add-balance');
    }

    public function saveBalance(Request $request){
        $validateData = $request->validate([
            'balance' => 'required',
        ],
        [
            'balance.required' => 'Balance is required',
        ]);

        Balance::insert([
        'balance' => $request->balance,
        'created_at' => Carbon::now(),
   ]);

        $notification = array(
            'message' => 'Balance Added Successfully',
            'alert-type' => 'success',
        );
      return redirect()->route('admin.balance.show')->with($notification);
    }

    public function ShowBalance(){
        $balances = Balance::all();
        return view('backend.balance.balance-list',compact('balances'));
    }

    public function editBalance($id){
        $data = Balance::findorfail($id);
        return view('backend.balance.edit-balance',compact('data'));
    }

    public function updateBalance(Request $request,$id){
        $validateData = $request->validate([
            'balance' => 'required',
        ],
        [
            'balance.required' => 'Balance is required',
        ]);

        Balance::findOrFail($id)->update([
        'balance' => $request->balance,
   ]);

        $notification = array(
            'message' => 'Balance Updated Successfully',
            'alert-type' => 'success',
        );
      return redirect()->route('admin.balance.show')->with($notification);
    }

    public function deleteBalance($id){
        Balance::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Balance Deleted Successfully',
            'alert-type' => 'warning',
        );
      return redirect()->back()->with($notification);
    }
}
