@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')
    @include('components.menus.services')

    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>status</th>
                <th>Opcciones</th>
            </tr>
        </thead>
        <tbody>
            @isset($services)
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->status}}</td>
                        <td>
                            <a class="button is-small is-danger">Eliminar</a>
                            <a class="button is-small">Editar</a>
                        </td>
                    </tr>
                @endforeach
                @if($services->isEmpty())
                    <tr>
                        <td colspan="3"><p>No tienes servicios registrados</p></td>
                    </tr>
                @endif
            @endisset
        </tbody>
    </table>
@endsection
