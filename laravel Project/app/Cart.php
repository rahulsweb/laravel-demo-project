<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    /**
     * Cart Model of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public $items=null;
    
    public $totalQty=0;
    public $totalPrice=0;
    public function __construct($oldCart)
    {
        if($oldCart){
            
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
        else
        {
            $this->items=null;
        }
    }


/**
     * AddProduct add product related to the cart.
     *
     * @return \Illuminate\Http\Response
     */


    public function addProduct($item,$id)
    {
      
        if(session()->has('coupon_used'))
        session()->forget('coupon_used');
        if(session()->has('discount_amount'))
        session()->forget('discount_amount');
    
        $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
        if($this->items)
        {
         

            if(isset($this->items[$id]))
            {
                   $store= $this->items[$id];
               
            }
          
        }
        if(isset($this->items[$id]))
        {
          
            $this->totalQty;
        }
        else
        {
            $this->totalQty++;
        }
        $store['qty']++;
        $store['price']=$item->rate * $store['qty']; 
        $this->items[$id]=$store;
   
        $this->totalPrice+=$item->rate;
        
    }

/**
     * Remove Cart Element related to the product.
     *
     * @return \Illuminate\Http\Response
     */



            public function removeProduct($product,$id)
        {
            if(session()->has('coupon_used'))
            session()->forget('coupon_used');
            if(session()->has('discount_amount'))
            session()->forget('discount_amount');
            if($this->items)
            {
 
             
                if(isset($this->items[$id]))
                {
                 
              
                       $removeProduct= $this->items[$id];
                     
                       $this->totalQty=$this->totalQty-1;
                       $this->totalPrice=$this->totalPrice-$removeProduct['price'];
                   
                       array_forget($this->items,$id);
                      
                }
            
            }

        }

        /**
     * AddCart product add in the cart when use this instance.
     *
     * @return \Illuminate\Http\Response
     */


        public function addCart($item,$id)
        {
  
            if(session()->has('coupon_used'))
            session()->forget('coupon_used');
            if(session()->has('discount_amount'))
            session()->forget('discount_amount');
            $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
            if($this->items)
            {
               
                if(isset($this->items[$id]))
                {
                       $store= $this->items[$id];
                }
              
            }

            if($store['qty'] >= $item->qty_left )
            {
                $store['qty'];
         
                $store['price']=$item->rate * $store['qty']; 
                $this->items[$id]=$store;
                $this->totalQty;
                $this->totalPrice;
            }
            else
            {
                $store['qty']++;
                $store['price']=$item->rate * $store['qty']; 
                $this->items[$id]=$store;
                $this->totalQty;
                $this->totalPrice+=$item->rate;
            }
       

        
        }



/**
     * count one minus on cart when minusCart method called.
     *
     * @return \Illuminate\Http\Response
     */


        public function minusCart($item,$id)
        {
            if(session()->has('coupon_used'))
            session()->forget('coupon_used');
            if(session()->has('discount_amount'))
            session()->forget('discount_amount');
            $store=['qty'=>0,'price'=>$item->rate,'item'=>$item];
        
            if($this->items)
            {
               
                if(isset($this->items[$id]))
                {
                       $store= $this->items[$id];
                }
              
            }
            $store['qty']--;
            if($store['qty'] >= 1)
            {
            $store['price']=$item->rate * $store['qty']; 
            $this->items[$id]=$store;
            $this->totalQty;
            
            $this->totalPrice-=$item->rate;
            }
            else
            {
                $store['qty']=1;
            }
        }

}
