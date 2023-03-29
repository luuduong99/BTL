<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;

    protected $table = "ratings";
    protected $primerikey = 'id';
    protected $fillable = [
        'id',
        'rating',
        'product_id',
        'customer_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customers', 'customer_id');
    }

}
