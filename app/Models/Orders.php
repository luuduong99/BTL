<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'customer_id',
        'order_note',
        'order_status',
        'total_price',
        'order_pt',
        'vpn_response_code',
        'code_bank',
        'code_vnpay'
    ];

    public function orderDetail ()
    {
        return $this->has('App\Models\OrderDetail');
    }

    public function customer ()
    {
        return $this->belongsTo('App\Models\Customers', 'customer_id');
    }
}
