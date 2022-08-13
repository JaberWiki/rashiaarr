<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Debit;
use Carbon\Carbon;
Use App\Models\Branch;
Use App\Models\Ledger;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
	public function AddPayment(){
		
		$branches = Branch::all();
		$ledgers = Ledger::all();
		return view('backend.payment.add-payment',compact('branches','ledgers'));
	}
    
    //save Record

    public function saveRecord(Request $request){
        $payment_id = Payment::insertGetId([
            'voucher' => $request->voucher,
            'date' => $request->date,
            'branch_id' => $request->branch_id,
            'note' => $request->note,
            'created_at' => Carbon::now(),
        ]);
        
        foreach($request->details as $key=>$value){
            $saveRecord = [
                'payment_id' => $payment_id,
                'ledger_id' => $request->ledger_id[$key],
                'details' => $request->details[$key],
                'amount' => $request->amount[$key],
            ];
            
            DB::table('paydebits')->insert($saveRecord);
            
            
        }
        $notification = array(
            'message' => 'Payment Added Successfully',
            'alert-type' => 'success',
        );
        return redirect('/admin/payment/view/'.$payment_id)->with($notification);
   	 $pay_id = Payment::insertGetId([
      	'voucher' => $request->voucher,
      	'date' => $request->date,
      	'branch_id' => $request->branch_id,
      	'note' => $request->note,
      	'created_at' => Carbon::now(),
   ]);

    	foreach($request->details as $key=>$value){
    		$saveRecord = [
    			'payment_id' => $pay_id,
                'branch_id' => $request->branch_id,
                'ledger_id' => $request->ledger_id[$key],
    			'details' => $request->details[$key],
    			'amount' => $request->amount[$key],
    			'created_at' => Carbon::now(),
    		];
    		
    	 DB::table('debits')->insert($saveRecord);

    		
    	}
    	 $notification = array(
            'message' => 'Payment Added Successfully',
            'alert-type' => 'success',
        );
    	return redirect('/admin/payment/view/'.$pay_id)->with($notification);
    }

    public function ShowPayment(){
    	$payments = Payment::orderBy('created_at', 'DESC')->get();
    	return view('backend.payment.payment-list',compact('payments'));
    }

    public function viewPaymentById($id){
    	$payment = Payment::findOrFail($id);
    	$debits = Debit::where('payment_id',$payment->id)->get();
    	return view('backend.payment.view-payment',compact('payment','debits'));
    }

    public function deletePayment($id){
    	$payment = Payment::findOrFail($id);
    	Debit::where('payment_id',$payment->id)->delete();
    	Payment::findOrFail($id)->delete();
    	$notification = array(
	            'message' => 'Payment Deleted Successfully',
	            'alert-type' => 'error',
	        );
	      return redirect()->back()->with($notification);
    }

 public function PrintPayment($id){
    $payment = Payment::findOrFail($id);
    $debits = Debit::where('payment_id',$payment->id)->get();
    return view('backend.payment.print-payment',compact('payment','debits'));
 }

 public function editPayment($id){
    $payment = Payment::findOrFail($id);
    $branches = Branch::all();
    $ledgers = Ledger::all();
    $debits = Debit::where('payment_id',$payment->id)->get();
    return view('backend.payment.edit-payment',compact('payment','branches','ledgers','debits'));
   }

   public function deletePaymentDetails(Request $request,$id){
     Debit::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Deleted Successfully',
            'alert-type' => 'success',
        );
      return redirect()->back()->with($notification);
   }

   public function Adddetails(Request $request){
    $id = $request->id;
    $branch_id = $request->branch_id;

     foreach($request->details as $key=>$value){
            $saveRecord = [
                'payment_id' => $id,
                'branch_id' => $request->branch_id,
                'ledger_id' => $request->ledger_id[$key],
                'details' => $request->details[$key],
                'amount' => $request->amount[$key],
            ];
            
         DB::table('debits')->insert($saveRecord);

            
        }
         $notification = array(
            'message' => 'Payment Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
   }
   
   public function updateDetails(Request $request, $id){
      Payment::findOrFail($id)->update([
        'created_at'=>$request->date,
      ]);

       Debit::where('payment_id',$id)->update([
        'created_at'=>$request->date,
      ]);


      $notification = array(
            'message' => 'Payment Updated Successfully',
            'alert-type' => 'success',
        );
      return redirect()->back()->with($notification);
   }
}
