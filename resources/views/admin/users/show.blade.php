@extends('layouts.app')

@section('content')
<div class="flex items-start justify-items-stretch p-5 border-b border-solid border-gray-300 rounded-t">
    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
        href="{{ route('users.index') }}">Back</a>
    <h3 class="text-3xl font-semibold mx-3">
        Show User
    </h3>
</div>
<!--body-->
<div class="flex flex-wrap py-3">
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <p class="my-4 text-lg leading-relaxed">
            <strong>Name:</strong> {{$user->name}}
        </p>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>Email:</strong>
                {{ $user->email }}
            </p>

        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <p class="my-4 text-lg leading-relaxed">
                <strong>Roles:</strong>
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label
                    class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded bg-green-500 text-white hover:green-600">{{ $v }}</label>
                @endforeach
                @endif
            </p>
        </div>
    </div>
</div>
@endsection