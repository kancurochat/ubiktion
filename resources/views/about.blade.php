@extends('layouts.master')



@section('content')
<section class="grid">
    <h1 class="grid-cols-1 justify-self-center md:justify-self-center text-blue-dark text-5xl py-3">Cómo funciona</h1>
    <ol class="grid-rows-1 justify-self-center px-10 py-2 list-decimal text-blue-dark mb-10 text-xl">
        <li class="grid-cols-1 py-3">Asegúrate de tener
            la ubicación activada.</li>
        <li class="grid-cols-1 py-3">Saca una foto del lugar
            que quieres señalar en el mapa.</li>
        <li class="grid-cols-1 py-3">En la página “Añadir punto”,
            sube la imagen
            y añade una
           descripción para la foto.</li>
    </ol>
</section>

@endsection