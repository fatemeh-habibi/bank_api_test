<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends BaseModel
{
    protected $guarded = ['id'];
    protected $appends = [];
}
