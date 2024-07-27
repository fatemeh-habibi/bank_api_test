<?php

namespace App\Models;

use App\Helpers\Model\Authorable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Authorable;

    public function created_user()
    {
        return $this->belongsTo(User::class,'created_user_id');
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class,'updated_user_id');
    }
}
