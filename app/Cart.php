<?php


namespace App;


class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalTax = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalTax = $oldCart->totalTax;
        }
    }

    public function add($item, $id)
    {
        $storeItem = ['qty' => 0, 'price' => 0, 'item' => $item,'tax' =>0];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeItem = $this->items[$id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price'] = $item->price * $storeItem['qty'];
        $storeItem['tax'] = $item->price * $storeItem['qty'] * $item->tax;
        $this->items[$id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice += $item->product_price;
        $this->totalTax += $item->tax;
    }

    public function reduceByOne($id){

        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalTax -= $this->items[$id]['item']['tax'];
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }


}
