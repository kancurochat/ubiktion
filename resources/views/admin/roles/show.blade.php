@extends('layouts.app')

@section('content')
<div class="flex items-start justify-items-stretch p-5 border-b border-solid border-gray-300 rounded-t">
    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
                                            href="{{ route('roles.index') }}">Back</a>
    <h3 class="text-3xl font-semibold mx-3">
        Show Role
    </h3>
</div>
<!--body-->
<div class="relative p-6 flex-auto">
    <p class="my-4 text-lg leading-relaxed">
        <strong>Name:</strong> {{$role->name}}
    </p>
    <p class="my-4 text-lg leading-relaxed">
        <strong>Permissions:</strong>
        @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
        <label class="label label-success">{{ $v->name }},</label>
        @endforeach
        @endif
    </p>
</div>
@endsection