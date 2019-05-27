@extends('layouts.app')

@section('before_content')
    <section class="hero is-medium is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Bienvenidos a
                </h1>
                <h2 class="subtitle">
                    Service control
                </h2>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="columns">
        <div class="column m-bottom-50">
            <div class="column is-half is-offset-one-quarter">
                <h3 class="title is-3 is-spaced" style="text-align: center;">Tecnología</h3>
                <h5 class="subtitle is-5 has-text-grey-light" style="text-align: center;">
                    Algunas de las tecnologías y lenguajes de programación que se utilizaron para el desarrollar este proyecto.
                </h5>
            </div>
        </div>
    </div>
    <nav class="level">
        <div class="level-item has-text-centered">
            <div>
                <span class="icon is-large has-text-danger">
                  <i class="fab fa-laravel fa-3x"></i>
                </span>
                <p class="heading">Laravel</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <span class="icon is-large">
                  <i class="fab fa-github fa-3x"></i>
                </span>
                <p class="heading">Github</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <span class="icon is-large has-text-info">
                  <i class="fab fa-yarn fa-3x"></i>
                </span>
                <p class="heading">Yarn</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <span class="icon is-large">
                  <img src="{{asset('img/heroku.svg')}}"
                       alt="triangle with all three sides equal"
                       class="fa-3x" />
                </span>
                <p class="heading">Heroku</p>
            </div>
        </div>
    </nav>

@endsection
