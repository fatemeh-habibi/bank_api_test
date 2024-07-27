<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends BaseModel
{
    use HasFactory;

    protected $guarded=['id'];
    protected $appends = [];
    
    public function payer_card()
    {
        return $this->belongsTo(Card::class,'payer_no');
    }

    public function payee_card()
    {
        return $this->belongsTo(Card::class,'payee_no');
    }

}
