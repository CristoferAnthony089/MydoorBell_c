    <!-- Modal Productos -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Eliminar?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="borrarProducto" method="POST">
                        @csrf
                        @method('DELETE')
                        <h3 id="nombreProducto"></h3>
                        <input type="hidden" name="id_pro" id="delete_id" value="">
                        <input type="submit" id="confirmarEliminacion" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">
                        <label for="confirmarEliminacion" class="w-100 h-100">
                            Si, Confirmar
                        </label>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Eliminar Carrito --}}
    <div class="modal fade mt-5" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Desea Eliminar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('client/shopping-cart/delete/' . session('usuario.id_usu')) }}" method="POST">
                        @csrf
                        <h3>Su Carrito?</h3>
                        @method('DELETE')
                        <input type="submit" id="confirmarEliminacionCarrito" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">
                        <label for="confirmarEliminacionCarrito" class="w-100 h-100">
                            Si, Confirmar
                        </label>
                    </button>
                </div>
            </div>
        </div>
    </div>
