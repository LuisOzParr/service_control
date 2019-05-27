@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')
    @include('components.menus.services')

    @component('components.box',['title'=>!isset($service)?'Nuevo servicio':'Editar servicio - "'.$service->name.'"'])

        @if(!isset($service)) <form method="POST" action="{{ route('service.store') }}">
        @else<form method="POST" action="{{ route('service.update', ['id'=>$service->id]) }}"> @method('PUT') @endif
            @csrf
            <hr>
            @include('components.errors')

            @component('components.field',['icon'=>'fa-tasks'])
                <input name="name"
                       type="text"
                       class="input @error('name') is-danger @enderror"
                       value="{{ old('name') }}{{ isset($service)?$service->name:null }}"
                       placeholder="Nombre del servicio"
                       required
                       autofocus>
            @endcomponent
            @isset($service)
                @component('components.field',['icon'=>'fa-power-off', 'fieldName'=>'status', 'class'=>'m-top-10'])
                    <span class="select is-fullwidth @error('status') is-danger @enderror">
                      <select name="status">
                        <option selected disabled>Estado del servicio</option>
                        <option value="1">habilitar</option>
                        <option value="0">Deshabilitado</option>
                      </select>
                    </span>
                @endcomponent
            @endisset
            <hr>
            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        @if(!isset($service))
                            Guardar
                        @else
                            Actualizar
                        @endif
                    </button>
                </p>
            </div>
        </form>
    @endcomponent

@endsection
