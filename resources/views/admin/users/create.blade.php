@extends('layouts.app')

@section('content')
<div class="flex items-start justify-items-stretch p-5 border-b border-solid border-gray-300 rounded-t">
    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-500"
        href="{{ route('users.index') }}">Back</a>
    <h3 class="text-3xl font-semibold mx-3">
        Create New User
    </h3>
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



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="flex flex-wrap p-4">
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full">
        <div class="mb-4">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' =>'multiple')) !!}
        </div>
    </div>
    <div class="sm:w-full pr-4 pl-4 md:w-full text-center">
        <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Submit</button>
    </div>
</div>
{!! Form::close() !!}
@endsection