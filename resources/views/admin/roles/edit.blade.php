@extends('layouts.app')

@section('content')
<div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t my-3">
    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
                                            href="{{ route('roles.index') }}">Back</a>
    <h3 class="text-3xl font-semibold mx-3">
        Edit Role
    </h3>
    <button
        class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
        onclick="toggleModal('modal-id')">
        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
            ×
        </span>
    </button>
</div>


@if (count($errors) > 0)
    <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="flex flex-wrap ">
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full text-center">
        <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection