<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $appends = [];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function cards(): HasManyThrough
    {
        return $this->hasManyThrough(Card::class, Account::class);
    }
}
