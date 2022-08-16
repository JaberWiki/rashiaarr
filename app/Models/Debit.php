<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    use HasFactory;
    protected $guarded = []; 
    
     public function ledger()
    {
        return $this->belongsTo('App\Models\Ledger');
    }
    
     public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }
    public function payment()
    {
        return $this->belongsTo('App\Models\Payment');
    }
}
