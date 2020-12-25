<?php


namespace App;


class Cart
{
    public $items =[];
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldcart)
    {
        if ($oldcart){
            $this->items = $oldcart->items;
            $this->totalPrice = $oldcart->totalPrice;
            $this->totalQty = $oldcart->totalQty;
        }
    }
    function add($product){
        $storeItem = [
            "product"=>$product,
            "totalQty"=>0,
            "totalPrice"=>0,
        ];
        if(array_key_exists($product->id,$this->items)) {
            $storeItem = $this->items[$product->id];
        }

        $storeItem['totalQty']++;
        $storeItem['totalPrice'] = $product->price * $storeItem['totalQty'];

        $this->items[$product->id] = $storeItem;

        $this->totalQty++;
        $this->totalPrice+=$product->price;
    }

    public function delete($product)
    {
        if(array_key_exists($product->id,$this->items))
        {
            $deletedItem = $this->items[$product->id];
            $this->totalQty -= $deletedItem['totalQty'];
            $this->totalPrice-= $deletedItem['totalPrice'];
            unset($this->items[$product->id]);
        }
    }
//    public function delete($product)
//    {
//        if(array_key_exists($product,$this->items)){
//            $storeItem = $this->items[$product];
//            $this->totalQty -= $storeItem['totalQty'];
//            $this->totalPrice -= $storeItem['totalPrice'];
//            unset($this->items[$product]);
//        }
//    }

    public function decrease($product)
    {
        if(array_key_exists($product->id,$this->items))
        {
            $decreasedProduct = $this->items[$product->id];
            $decreasedProduct['totalQty']--;
            $decreasedProduct['totalPrice']-=$this->items[$product->id]['product']->price;

            $this->items[$product->id] = $decreasedProduct;
            $this->totalQty--;
            $this->totalPrice-=$this->items[$product->id]['product']->price;
            if($decreasedProduct['totalQty']==0)
            {
                unset($this->items[$product->id]);
            }
        }
    }

    public function update($requestQty, $product) {
        if (array_key_exists($product->id,$this->items))
        {
            $updatedProduct = $this->items[$product->id];
            $qtyUpdate = $requestQty - $updatedProduct['totalQty'];
            $this->totalQty += $qtyUpdate;

            $priceUpdate = $updatedProduct['product']->price * $requestQty - $updatedProduct['totalPrice'];
            $this->totalPrice += $priceUpdate;

            $updatedProduct['totalQty'] = $requestQty;

            $updatedProduct['totalPrice'] = $updatedProduct['product']->price * $requestQty;
            $this->items[$product] = $updatedProduct;

        }
    }

}
