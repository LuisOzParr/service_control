@extends('layouts.app')

@section('content')
    @component('components.box',['title'=>__('Login'), 'class'=>'m-top-70 m-bottom-100'])
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @include('components.errors')
            <div class="field">
                <p class="control has-icons-left has-icons-right">

                    <input name="email" class="input @error('email') is-danger @enderror" type="email" value="{{ old('email') }}"  placeholder="{{ __('E-Mail Address') }}" required autofocus autocomplete="email"/>

                    <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                    </span>

                    @error('email')
                    <span class="icon is-small is-right">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </span>
                <p class="help is-danger">{{ $message }}</p>
                @enderror
                </p>
            </div>

            <div class="field">
                <p class="control has-icons-left">
                    <input class="input @error('password') is-danger @enderror" type="password" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">

                    <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="field">
                <p class="control">
                    <button class="button is-success">
                        {{ __('Login') }}
                    </button>
                </p>
            </div>
        </form>
    @endcomponent
@endsection
