@extends('layout')

@section('title', 'Nuevo usuario')

@section('scripts')
    @include('vendor.lrgt.ajax_script', ['form' => '#myForm',
    'request'=>'App/Http/Requests/CreateUserRequest','on_start'=>false])
@endsection

@section('content')
    <h1 class="text-3xl">Nuevo usuario</h1>

    <form id="myForm" action="{{ route('users.create')}}" method="post" class="mt-3" enctype="multipart/form-data">
        @include('users._fields')
        <div class="mt-3">
            <button class="border border-green-400 bg-green-600 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-400 focus:outline-none focus:shadow-outline" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Crear usuario</button>
            <a class="border border-blue-600 bg-trasparent text-blue-600 rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-blue-600 hover:text-white focus:outline-none focus:shadow-outline" href="{{ route('users.index') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Volver al listado de usuarios</a>
        </div>
    </form>
@endsection
