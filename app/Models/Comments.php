<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primerikey = 'id';
    protected $fillable = [
        'id',
        'content',
        'product_id',
        'customer_id',
        'reply_id',
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
