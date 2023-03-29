<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'quantity',
        'customer_id'
    ];

    public function order ()
    {
        return $this->belongsTo('App\Models\Orders', 'order_id');
    }

    public function product ()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }
}
