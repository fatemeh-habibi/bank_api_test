<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends BaseModel
{
    use HasFactory;
    
    protected $guarded = ['card_no'];
    protected $appends = [];
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'payer_no','payer_no');
    }

    public function user()
    {
        return $this->belongsTo(Account::class,'user_id','user_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class,'account_no','account_no');
    }

    public function accountUser(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Account::class);
    }

    public function accountBank(): HasOneThrough
    {
        return $this->hasOneThrough(Bank::class, Account::class);
    }

    public function scopeLoadRelations($query)
    {
        return $query->with(['account','created_user','updated_user']);
    }

}
