@extends('layouts.master')



@section('content')
<section class="grid my-4">
  <h1 class="grid-cols-1 justify-self-center text-center text-blue-dark text-5xl py-3 mb-10">Contacta con nosotros</h1>
  @if ($errors->any())
  <div class="grid grid-cols-1 text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
    role="alert">
    <strong class="font-bold">Hubo errores en el envío del formulario:</strong>
    <ul>
      @foreach($errors->all() as $error)
      <li>- {{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(Session::has('error'))
  <div class="grid grid-cols-1 text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
    role="alert">
    <strong class="font-bold">Hubo errores en el envío del formulario:</strong>
    <ul>
      <li>- {{ Session::get('error') }}</li>
    </ul>
  </div>
  @endif
  @if(Session::has('correcto'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded relative mb-4">
    <span class="inline-block align-middle mr-8">
      <strong class="font-bold">{{ Session::get('correcto') }}</strong>
    </span>
    <button
      class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
      onclick="closeAlert(event)">
      <span>×</span>
    </button>
  </div>
  <script>
    function closeAlert(event){
      let element = event.target;
      while(element.nodeName !== "BUTTON"){
        element = element.parentNode;
      }
      element.parentNode.parentNode.removeChild(element.parentNode);
    }
  </script>
  @endif
  <form class="grid grid-cols-4 justify-self-center p-3" action="" method="post">
    @csrf
    <label class="block col-span-2 mx-2 my-3">
      <span class="text-gray-700 text-lg">Nombre</span>
      <input name="nombre" id="nombre" type="text"
        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark"
        value="{{old('nombre')}}">
    </label>
    <label class="block col-span-2 mx-2 my-3">
      <span class="text-gray-700 text-lg">Email</span>
      <input type="email" name="email"
        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark"
        placeholder="example@example.com" value="{{old('email')}}">
    </label>

    <label class="block col-span-4 my-4">
      <span class="text-gray-700 text-lg">Mensaje</span>
      <textarea name="mensaje"
        class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark"
        rows="2">{{old('mensaje')}}</textarea>
    </label>
    <input
      class="cursor-pointer col-span-4 justify-self-end border-solid border-2 border-blue-light hover:border-blue-light p-2 rounded-2xl hover:bg-blue-dark text-blue-dark hover:text-white text-lg"
      type="submit" value="Enviar">
  </form>
</section>
@endsection