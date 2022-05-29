<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Plantilla;
use Illuminate\Support\Facades\Auth;

class IndexComponent extends Component
{
    public function render()
    {

        $plantillas = Plantilla::all();

        //Regresa la vista de index-component con la variable plantillas
        //que extiende de la plantilla principal
        return view('livewire.shop.index-component', compact('plantillas'))
            ->extends('plantilla/welcome')
            ->section('content');
    }



    public function add_to_cart(Plantilla $plantilla)
    {

       //Añado los valores de las plantillas al metodo
       //session de la clase Cart
        \Cart::session(auth()->id())->add(array(
            'id' => $plantilla->id,
            'name' => $plantilla->nombre,
            'price' => $plantilla->precio,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $plantilla
        ));

        //Envio un mensaje
        $this->emit('mensaje','Se ha agregado correctamente');
        
        //Le digo que al componente cart-component
        //me ejecute la funcion add_to_cart
        $this->emitTo('shop.cart-component','add_to_cart');
    }
}