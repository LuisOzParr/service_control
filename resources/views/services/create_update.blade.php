@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')
    @include('components.menus.services')

    @component('components.box',['title'=>'Nuevo servicio'])
        <form method="POST" action="{{ route('service.store') }}">
            @csrf
            <hr>
            @include('components.errors')

            @component('components.field',['icon'=>'fa-tasks'])
                <input name="name"
                       type="text"
                       class="input @error('name') is-danger @enderror"
                       value="{{ old('name') }}"
                       placeholder="Nombre del servicio"
                       required>
            @endcomponent
            <hr>
            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        Guardar
                    </button>
                </p>
            </div>
        </form>
    @endcomponent

@endsection
