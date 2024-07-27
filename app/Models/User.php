<?php

namespace App\Models;

use App\Helpers\Model\Authorable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens; // include this after passport install
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens; // update this after passport install
    use SoftDeletes,Authorable;
    use HasFactory;

    public const GENDER_MALE = 0;
    public const GENDER_FEMALE = 1;
    public const GENDER_UNKNOWN = 2;

    public const MOBILE_IS_NOT_VERIFIED = null;
    public const MOBILE_IS_VERIFIED = !null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=['id'];
    protected $appends = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password','remember_token',];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    /**
     * The attributes that can be sort.
     *
     * @var array
     */
    public $sortable = ['first_name', 'last_name', 'email', 'activation_code', 'mobile_verified_at', 'password', 'image','created_user_id','created_at', 'updated_at'];

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Card::class,'user_id','payer_no','id','card_no');
    }

    public function last_transactions()
    {
        $date1 = now()->subMinutes(3);
        $date2 = now();
        return $this->hasManyThrough(Transaction::class, Card::class,'user_id','payer_no','id','card_no')->whereBetween('transactions.created_at', [$date1, $date2])->orderBy('created_at', 'DESC')->limit(10);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function cards(): HasManyThrough
    {
        return $this->hasManyThrough(Card::class, Account::class);
    }

    public function created_user()
    {
        return $this->belongsTo(User::class,'created_user_id');
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class,'updated_user_id');
    }
  
    public function findForPassport($username) {
        return $this->where('username', $username)->first();
    }
      
    public function getFullNameAttribute()
    {
       return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function scopeLoadRelations($query)
    {
        return $query->with(['created_user','updated_user']);
    }
    
    public function getCreatedByAttribute()
    {
        
        if($this->first_name && $this->last_name){
            $name = $this->first_name.' '.$this->last_name;
        }        

        $result = (object)[
            'name' => $name ?? ''
        ];

        return $result;
    }

}
