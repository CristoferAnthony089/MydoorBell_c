@extends('layouts.footer_nav')

@section('contenido')
    <!-- Contactos -->
    <section class="contactob">
        <div class="contentCon">
            <h1 class="titulocontacto"><b>Contacto</b></h1>
            <br> <br>
            <div class="contactCon-wrapper">
                <div class="contactCon-form">
                    <form action="{{ url('client/contac') }}" method="POST">
                    @csrf
                        <p>
                            <label for="Nombre">Nombre</label>
                            <input type="text" name="nombre" id="Nombre" required>
                        </p>
                        <p>
                            <label for="Teléfono">Teléfono</label>
                            <input type="text" name="telefono" id="Telefono">
                        </p>
                        <p>
                            <label for="Correo">Correo eléctronico</label>
                            <input type="email" name="correo" id="Correo" required>
                        </p>

                        <p class="blockCon">
                            <label for="Comentario">Mensaje</label>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="3" required></textarea>
                        </p class="blockCon">
                        <button type="submit">
                            Enviar
                        </button>
                    </form>
                </div>
                <div class="contactCon-info">
                    <h2>Comunícate</h2>
                    <ul>

                        <li><a href="" class="icono-hoverCon"> <i class='bx bxl-instagram'></i></a><a
                                href="https://instagram.com/carcheap_?igshid=ZDdkNTZiNTM="> mydorbell_</a></li>
                        <li><a href="" class="icono-hoverCon"> <i class='bx bxl-facebook'></i></i></a><a
                                href="https://www.facebook.com/profile.php?id=100089353427427&mibextid=ZbWKwL">
                                MyDorbell</a></li>
                        <li> <a href="" class="icono-hoverCon"><i class='bx bxl-twitter'></i></i></a><a
                                href="https://twitter.com/Carcheap1?t=9j6VuqGw5dPBdiTh4Q-pRg&s=09">@Mydorbell </a></li>
                        <li><a href="" class="icono-hoverCon"> <i class='bx bxl-gmail'></i></i></a><a href="">
                                mydorbell@gmail.com</a></li>
                        <br>
                        <br>

                        <li><i class='bx bxs-phone'></i> Número telefónico: 5578902578/ 5586776680 </li>
                        <li><i class='bx bxs-map'></i> Dirección: Av. Tepozanes, Amanecer Ranchero, 56353 Nezahualcóyotl,
                            Méx.</li>
                    </ul>

                </div>
            </div>
        </div>


    </section>
@endsection()