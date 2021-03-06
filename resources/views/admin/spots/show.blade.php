@extends('layouts.app')

@section('content')
<div class="flex items-start justify-items-stretch p-5 border-b border-solid border-gray-300 rounded-t">
    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
        href="{{ route('spots') }}">Back</a>
    <h3 class="text-3xl font-semibold mx-3">
        Show Spot
    </h3>
</div>
<!--body-->
<div class="flex flex-wrap py-3">
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <p class="my-4 text-lg leading-relaxed">
            <strong>Photo:</strong> <img width="300px" src="{{$spot->photo}}" alt="">
        </p>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <p class="my-4 text-lg leading-relaxed">
            <strong>Photo URL:</strong> {{$spot->photo}}
        </p>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>Latitude:</strong>
                {{ $spot->latitude }}
            </p>

        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>Longitude:</strong>
                {{ $spot->longitude }}
            </p>

        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>Spot Type ID:</strong>
                {{ $spot->spot_type_id }}
            </p>

        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>User ID:</strong>
                {{ $spot->user_id }}
            </p>

        </div>
    </div>
@endsection