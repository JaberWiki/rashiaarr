<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Payment;
use App\Models\Reciept;
use App\Models\Debit;
use Carbon\Carbon;
use DB;

class BranchController extends Controller
{
    public function AddBranch(){
    	return view('backend.branch.add-branch');
    }

    public function StoreBranch(Request $request){
    	$validateData = $request->validate([
    		'branch_name' => 'required',
    		'branch_address' => 'required',
    		'country' => 'required',
    		'location' => 'required',
    		'note' => 'required',
    	],
    	[
    		'branch_name.required' => 'Branch Name is required',
    		'branch_address.required' => 'Branch Address is required',
    		'country.required' => 'Please select a Country',
    		'location.required' => 'Branch Location cannot be empty',
    	]);

        Branch::insert([
      	'branch_name' => $request->branch_name,
      	'branch_address' => $request->branch_address,
      	'country' => $request->country,
      	'location' => $request->location,
      	'note' => $request->note,
      	'created_at' => Carbon::now(),
   ]);

        $notification = array(
            'message' => 'Branch Added Successfully',
            'alert-type' => 'success',
        );
      return redirect()->route('admin.branch.show')->with($notification);
    }

    public function ShowBranchList(){
    	$branches = Branch::all();
    	return view('backend.branch.branch-list',compact('branches'));
    }

    public function deleteBranch($id){
	      Branch::findorfail($id)->delete();
	    	 $notification = array(
	            'message' => 'Branch Deleted Successfully',
	            'alert-type' => 'error',
	        );
	      return redirect()->back()->with($notification);
    }

    public function editBranch($id){
    	$data = Branch::findorfail($id);
    	return view('backend.branch.edit-branch',compact('data'));
    }

    public function updateBranch(Request $request,$id){
    	$validateData = $request->validate([
    		'branch_name' => 'required',
    		'branch_address' => 'required',
    		'country' => 'required',
    		'location' => 'required',
    		'note' => 'required',
    	],
    	[
    		'branch_name.required' => 'Branch Name is required',
    		'branch_address.required' => 'Branch Address is required',
    		'country.required' => 'Please select a Country',
    		'location.required' => 'Branch Location cannot be empty',
    	]);

        Branch::findOrFail($id)->update([
      	'branch_name' => $request->branch_name,
      	'branch_address' => $request->branch_address,
      	'country' => $request->country,
      	'location' => $request->location,
      	'note' => $request->note,
   ]);

        $notification = array(
            'message' => 'Branch Updated Successfully',
            'alert-type' => 'success',
        );
      return redirect()->route('admin.branch.show')->with($notification);
    }
     public function BranchRepot($id){
        $branch = Branch::findOrFail($id);
        $payments = Payment::where('branch_id',$branch->id)->get();
        $reciepts = Reciept::where('branch_id',$branch->id)->get();
        return view('backend.branch.branch-report',compact('branch','payments','reciepts'));
    }
    
     public function TotalBranchRepot($id){
      $branch = Branch::findOrFail($id);
     $debits =  Debit::Where('branch_id',$id)
      ->selectRaw("debits.* , SUM(amount) as amount")
      ->groupBy('ledger_id')
      ->get();

      return view('backend.branch.all-branch-report',compact('debits','branch'));
   }
   
    public function searchReport($id){
       $branch = Branch::findOrFail($id);
       return view('backend.branch.search-branch-report',compact('branch'));
   }

   public function generateReport(Request $request){
      $branch_id = $request->branch_id;
      $branch = Branch::findOrFail($branch_id);
      $from = $request->from;
      $to = $request->to;

      $enddate = date('Y-m-d', strtotime($to . ' +1 day'));

      $debits = Debit::where('branch_id',$branch_id)
                          ->whereBetween('created_at', [$from, $enddate])
                          ->selectRaw("debits.* , SUM(amount) as amount")
                          ->groupBy('ledger_id')
                          ->get();

     return view('backend.branch.report-by-search',compact('debits','from','to','branch','enddate'));

   }
}
