<div class="container p-4">
    <div class="row">

        @foreach($plantillas as $plantilla)
        <div class="col-md-4 p-4">
            <div class="card">
            <img class="card-img-top" src="{{$plantilla->imagen}}" alt="Card image cap">
                <div class="card-body">

                    <h5 class="card-title">{{$plantilla->nombre}}</h5>

                    <p class="card-text"> {{$plantilla->descripcion}}. <br> Precio: {{ $plantilla->precio}}€</p>

                    <!-- Utilizo livewire para crear una funcion -->
                    <button wire:click="add_to_cart({{$plantilla->id}})" type="button" class="btn btn-primary">Agregar al carrito de compras</button>
                    <br><br>
                    
                    <a href="{{$plantilla->url}}" class="btn btn-primary">Ver Demo</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>