@extends('layouts.master')



@section('content')
<section class="grid my-4">
    <h1 class="grid-cols-1 justify-self-center text-center text-blue-dark text-5xl py-3 mb-10">Contacta con nosotros</h1>
    <form class="grid grid-cols-4 justify-self-center p-3" action="" method="post">
            <label class="block col-span-2 mx-2 my-3">
                <span class="text-gray-700 text-lg">Nombre</span>
                <input name="nombre" id="nombre" type="text" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark" placeholder="">
              </label>
              <label class="block col-span-2 mx-2 my-3">
                <span class="text-gray-700 text-lg">Email</span>
                <input type="email" class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark" placeholder="john@example.com">
              </label>
        
          <label class="block col-span-4 my-4">
            <span class="text-gray-700 text-lg">Mensaje</span>
            <textarea class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark" rows="2"></textarea>
          </label>
          <input class="cursor-pointer col-span-4 justify-self-end border-solid border-2 border-blue-light hover:border-blue-light p-2 rounded-2xl hover:bg-blue-dark text-blue-dark hover:text-white text-lg" type="submit" value="Enviar">
    </form>
</section>
@endsection