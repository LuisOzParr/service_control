@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')
    <!-- Main container -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">

        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item"><a href="{{route('service.index')}}">Todos</a></p>
            <p class="level-item"><a href="{{route('service.create')}}" class="button is-success">Nuevo</a></p>
        </div>
    </nav>

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
            <tr>
                @isset($services)
                    @foreach($services as $service)
                        <td>{{$service->id}}}</td>
                        <td>{{$service->name}}}</td>
                        <td>{{$service->status}}</td>
                        <td>
                            <a class="button is-small is-danger">Eliminar</a>
                            <a class="button is-small">Editar</a>
                        </td>
                    @endforeach
                    @if($services->isEmpty())
                        <td colspan="3"><p>No tienes servicios registrados</p></td>
                    @endif
                @endisset
            </tr>
        </tbody>
    </table>

@endsection
