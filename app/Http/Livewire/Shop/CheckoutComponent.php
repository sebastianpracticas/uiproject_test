<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public function render()
    {
        return view('livewire.shop.checkout-component')
            ->extends('plantilla/welcome_home')
            ->section('content');
    }
}
