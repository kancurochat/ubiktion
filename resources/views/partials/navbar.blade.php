@include('layouts.navigation')
<header class="grid sm:grid-cols-1 md:grid-cols-8 justify-center">
<img class="justify-self-end md:grid-cols-3 sm:grid-cols-1 p-10 col-span-3" src="{{asset('/img/Ubiktion.svg')}}" alt="Ubiktion logo">
<ul class="md:grid grid-cols-4 my-auto bg-blue-light rounded-lg justify-self-start col-span-5 hidden">
    @if ($_SERVER['REQUEST_URI'] == '/')
    <li class="bg-blue-dark text-white p-4 text-center rounded-l-lg"><a href="/">Mapa</a></li>
    @else
    <li class="p-4 text-center hover:bg-blue-dark rounded-l-lg hover:text-white"><a href="/">Mapa</a></li>
    @endif
    
    @if ($_SERVER['REQUEST_URI'] == '/about')
    <li class="bg-blue-dark text-white p-4 text-center"><a href="/about">Cómo funciona</a></li>
    @else
    <li class="p-4 text-center hover:bg-blue-dark hover:text-white"><a href="about">Cómo funciona</a></li>
    @endif
    
    @if ($_SERVER['REQUEST_URI'] == '/add')
    <li class="p-4 text-center bg-blue-dark text-white"><a href="add">Añadir punto</a></li>
    @else
    <li class="p-4 text-center hover:bg-blue-dark hover:text-white"><a href="add">Añadir punto</a></li>
    @endif
    
    @if ($_SERVER['REQUEST_URI'] == '/contact')
    <li class="p-4 text-center bg-blue-dark rounded-r-lg text-white"><a href="contact">Contacto</a></li>
    @else
    <li class="p-4 text-center hover:bg-blue-dark rounded-r-lg hover:text-white"><a href="contact">Contacto</a></li>
    @endif
    
</ul>
</header>
