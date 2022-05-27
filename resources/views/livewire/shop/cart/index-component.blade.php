<div>

    <div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($cart_items as $item)
                <tr>

                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity = 1}}</td>

                    <td>
                        <button wire:click="delete_item({{$item->id}}) " type="button"
                            class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
        
        <h4>Total: {{ \Cart::session(auth()->id())->getTotal()}}</h4>

        <a href="/checkout" class="btn btn-primary">Pagar</a>
    </div>

</div>