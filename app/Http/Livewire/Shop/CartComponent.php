<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class CartComponent extends Component
{

    public $carts;
    
    //Cada ves que llame a la funcion add_to_cart ejecuta la 
    //vista shop.cart-component
    protected $listeners=['add_to_cart'=>'render'];


    //La vista que contiene el num de productos
    public function render()
    {
        return view('livewire.shop.cart-component');
    }
}