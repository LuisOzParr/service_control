@extends('layouts.app')

@section('content')
    @component('components.box',['title'=>__('Register') ])
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @include('components.errors')
            @component('components.field',['icon'=>'fa-user','fieldName'=>'name'])
                <input type="text"
                       class="input @error('name') is-danger @enderror"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="{{ __('Name') }}"
                       required autocomplete="name"
                       autofocus>
            @endcomponent

            @component('components.field',['icon'=>'fa-envelope','fieldName'=>'email'])
                <input type="email"
                       class="input @error('email') is-danger @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="{{ __('Email') }}"
                       required
                       autocomplete="email">
            @endcomponent

            @component('components.field',['icon'=>'fa-lock','fieldName'=>'password'])
                <input type="password"
                       class="input @error('password') is-danger @enderror"
                       placeholder="{{ __('Password') }}"
                       name="password"
                       required autocomplete="new-password">
            @endcomponent

            @component('components.field',['icon'=>'fa-lock','fieldName'=>'password_confirmation'])
                <input type="password"
                       class="input @error('password_confirmation') is-danger @enderror"
                       placeholder="{{ __('Confirm Password') }}"
                       name="password_confirmation"
                       required autocomplete="new-password">
            @endcomponent
            <hr>
            @component('components.field',['icon'=>'fa-sort-numeric-down','fieldName'=>'age'])
                <input type="number"
                       class="input @error('age') is-danger @enderror"
                       placeholder="{{ __('Edad') }}"
                       name="age"
                       required autocomplete="age">
            @endcomponent

            @component('components.field',['icon'=>'fa-venus-mars', 'fieldName'=>'gender', 'class'=>'m-top-10'])
                <span class="select is-fullwidth @error('gender') is-danger @enderror">
                  <select name="gender" required autocomplete="gender">
                    <option selected disabled>Genero</option>
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                    <option value="other">Otro</option>
                  </select>
                </span>
            @endcomponent



            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        {{ __('Register') }}
                    </button>
                </p>
            </div>
        </form>
    @endcomponent

@endsection
