<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\Debit;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class BalanceController extends Controller
{
    public function AddBalance()
    {
        return view('backend.balance.add-balance');
    }

    public function saveBalance(Request $request)
    {
        $validateData = $request->validate(
            [
                'balance' => 'required',
            ],
            [
                'balance.required' => 'Balance is required',
            ]
        );

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

    public function ShowBalance()
    {
        $balances = Balance::all();
        return view('backend.balance.balance-list', compact('balances'));
    }

    public function editBalance($id)
    {
        $data = Balance::findorfail($id);
        return view('backend.balance.edit-balance', compact('data'));
    }

    public function updateBalance(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                'balance' => 'required',
            ],
            [
                'balance.required' => 'Balance is required',
            ]
        );

        Balance::findOrFail($id)->update([
            'balance' => $request->balance,
        ]);

        $notification = array(
            'message' => 'Balance Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.balance.show')->with($notification);
    }

    public function deleteBalance($id)
    {
        Balance::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Balance Deleted Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }

    // public function searchBalance(Request $request){
    //     $search = $request->search;
    //     $balances = Balance::where('balance','like','%'.$search.'%')->get();
    //     return view('backend.balance.balance-list',compact('balances'));
    // }
    //balance sheet report
    public function balanceSheet($from = 0, $to = 0)
    {
        $balanceSheet = [];
        foreach (Debit::all() as $debit) {
            $payment = Payment::where('id', $debit->payment_id)->first();
            $n = Carbon::createFromFormat('d/M/Y', $payment->date)->format('d-m-Y');
            $balanceSheet[] = [
                'date' =>  $n,
                'particulates' => 'Ledger',
                'specific' => $debit->ledger->ledger_name,
                'payment_type' => $payment->voucher,
                'debit' => $debit->amount,
                'credit' => 0,
            ];
        }
        foreach (Purchase::all() as $purchase) {
            $n = Carbon::createFromFormat('Y-m-d', $purchase->date)->format('d-m-Y');
            $balanceSheet[] = [
                'date' => $n,
                'particulates' => 'Purchase',
                'specific' => $purchase->name,
                'payment_type' => $purchase->voucher,
                'debit' => $purchase->price,
                'credit' => 0,
            ];
        }
        foreach (Balance::all() as $balance) {
            $balanceSheet[] = [
                'date' => $balance->created_at->format('d-m-Y'),
                'particulates' => 'Balance',
                'specific' => '',
                'payment_type' => '',
                'debit' => 0,
                'credit' => $balance->balance,
            ];
        }
        $totalDebit = array_sum(array_column($balanceSheet, 'debit'));
        $totalCredit = array_sum(array_column($balanceSheet, 'credit'));
        $totalBalance = $totalCredit - $totalDebit;
        dd($balanceSheet);
        if ($from != 0 && $to != 0) {
            dd($from, $to);
            $balancesheets = collect($balanceSheet)->sortByDesc('date')->whereBetween('date', [$from, $to]);
        } else {
            $balancesheets = collect($balanceSheet)->sortByDesc('date');
        }
        return view('backend.balance.balance_sheet', compact('balancesheets', 'totalDebit', 'totalCredit', 'totalBalance'));
    }

    public function generateReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;


        $start_date = Carbon::createFromFormat('m/d/Y', $from)->format('d-m-Y');

        $end_date = Carbon::createFromFormat('m/d/Y', $to)->format('d-m-Y');

        return $this->balanceSheet($start_date, $end_date);

        //    return view('backend.balance.balance_sheet',compact('debits','from','to','ledger','enddate'));

    }

    public function searchReport($id)
    {
        $ledger = Ledger::findOrFail($id);
        return view('backend.ledger.search-ledger-report', compact('ledger'));
    }
}
