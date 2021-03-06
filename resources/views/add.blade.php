@extends('layouts.master')



@section('content')

<section class="grid my-4">
    <h1 class="grid-cols-1 justify-self-center text-center text-blue-dark text-5xl py-3 mb-10 px-4">Añade un punto en el
        mapa</h1>
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
    <form enctype="multipart/form-data" class="grid grid-cols-2 justify-self-center p-3" action="" method="post">
        @csrf
        <label class="block col-span-2 md:col-span-1 md:mx-2 my-3">
            <span class="text-gray-700 text-lg">Foto</span>
            <input name="foto" id="foto" type="file"
                class="p-2 mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark">
        </label>
        <label class="block col-span-2 md:col-span-1 md:mx-2 my-3 p-1.5">
            <span class="text-gray-700 text-lg">Tipo de punto</span>
            <select
                class="p-2 block w-full mt-0 px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark" name="spot_type_id">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
        </label>
        <label class="block col-span-2 my-4">
            <span class="text-gray-700 text-lg">Descripción</span>
            <textarea
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-blue-light focus:ring-0 focus:border-blue-dark"
                rows="2" name="descripción" id="descripción">{{old('descripción') ?? ''}}</textarea>
        </label>
        <input
            class="cursor-pointer col-span-2 justify-self-end border-solid border-2 border-blue-light hover:border-blue-light p-2 rounded-2xl hover:bg-blue-dark text-blue-dark hover:text-white text-lg"
            type="submit" value="Enviar">
    </form>
</section>
@endsection