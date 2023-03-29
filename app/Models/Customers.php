<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'customer_image',
        'customer_email',
        'customer_name',
        'customer_password',
        'customer_acc',
        'customer_address',
        'customer_phone',
        'customer_gender',
        'customer_token',

    ];

    public function order()
    {
        return $this->hasMany('App\Models\Orders');
    }

    public function rating()
    {
        return $this->hasMany('App\Models\Ratings');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comments');
    }

}
