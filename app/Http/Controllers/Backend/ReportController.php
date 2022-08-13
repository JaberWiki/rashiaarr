<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use App\Models\Balance;
Use App\Models\Stockin;
Use App\Models\Debit;

class ReportController extends Controller
{
    public function showReport(){
        $balance = Balance::all()->sum('balance');
        $stockin = Stockin::all()->sum('price');
        $debit = Debit::all()->sum('amount');
        $current = $balance-($stockin+$debit);
        return view('backend.report.show-report',compact('balance','stockin','debit','current'));
    }
}
