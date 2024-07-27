<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends BaseModel
{
    use HasFactory;

    protected $primaryKey = 'account_no';
    public $keyType = 'string';
    public $incrementing = false;
    protected $guarded = ['account_no'];
    
    public function cards()
    {
        return $this->hasMany(Card::class,'card_no','card_no');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
