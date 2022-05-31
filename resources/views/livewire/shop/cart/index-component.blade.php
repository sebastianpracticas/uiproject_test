<div class="container p-4">
    <div class="row">

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

    </div>
    <div class="col-md-4 ">
        <form method="POST" action="/pagar" id="formCerrar">
            <div class="form-group">
            @csrf
                <label for="exampleFormControlTextarea1">¿Qué servicios buscas? </label>
                <textarea name="comentario" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <input class="btn btn-primary btn-block mt-2 mb-2" type="submit" value="Enviar pedido">
        </form>
    </div>
</div>