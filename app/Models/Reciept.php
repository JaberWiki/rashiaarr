<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    use HasFactory;

    protected $guarded = [];

     public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

}
