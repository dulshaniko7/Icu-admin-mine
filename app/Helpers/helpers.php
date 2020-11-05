<?php

function with_order($product_id){
   $orders = \App\Order::where('product_id',$product_id)->get();
$count = $orders->count();

   return $count;
}
