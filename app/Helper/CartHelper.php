<?php

namespace App\Helper;

use Illuminate\Http\Request;

class CartHelper
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantyti();
    }

    public function add($product, $quantity = 1)
    {
        if($product->product_quantity > 0) {
            $item = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_images' => $product->product_images,
                'product_price' => $product->product_price,
                'product_discount' => $product->product_discount,
                'product_ram' => $product->product_ram,
                'product_quantity' => $product->product_quantity,
                'product_cl' => $product->product_cl,
                'product_memory' => $product->product_memory,
                'quantity' => 1,
            ];
            if (isset($this->items[$product->id])) {
                $this->items[$product->id]['quantity'] += $quantity;
            } else {
                $this->items[$product->id] = $item;
            }

            session(['cart' => $this->items]);
        } else {
            return redirect()->back()->with('er', 'Sản phẩm đã hết hàng');
        }
    }

    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity = 1)
    {
        if (isset($this->items[$id]) ) {
            if ($quantity < $this->items[$id]['product_quantity']) {
                $this->items[$id]['quantity'] = $quantity;
                session(['cart' => $this->items]);
            } else {
            return redirect()->back()->with('er', 'Sản phẩm trong kho không đủ');
            }
        }
    }

    public function clear()
    {
        session(['cart' => '']);
    }

    private function get_total_price()
    {
        $total = 0;
        foreach ($this->items as $items) {
            if($items['product_discount'] > 0) {
                $total += ($items['product_price']-($items['product_price'] * $items['product_discount']/100)) * $items['quantity'];
            } else {
                $total += $items['product_price'] * $items['quantity'];
            }
        }
        return $total;
    }

    private function get_total_quantyti()
    {
        $total = 0;
        foreach ($this->items as $items) {
            $total += $items['quantity'];
        }
        return $total;
    }
}
