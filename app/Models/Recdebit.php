<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recdebit extends Model
{
    use HasFactory;

    protected $guarded = [];
    
     public function ledger()
    {
        return $this->belongsTo('App\Models\Ledger');
    }
}
