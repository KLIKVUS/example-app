@extends('layouts.base')

@section('page.title', __('Аунтефикация'))

@section('content')
    <div class="row">
        <x-form.small name="Аунтефикация">
            <x-form.index
                method="POST"
                :action="route('auth.login.store')"
                btnText="Войти"
            >
                <div class="mb-3">
                    <label
                        for="login"
                        class="form-label"
                    >Логин:</label>
                    <input
                        type="text"
                        name="login"
                        value="{{ request()->old('login') }}"
                        class="form-control"
                        id="login"
                        autofocus
                        required
                    />
                    <x-error.text name="login" />
                </div>

                <div class="mb-3">
                    <label
                        for="password"
                        class="form-label"
                    >Пароль:</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        minlength="4"
                        required
                    >
                    <x-error.text name="password" />
                </div>
            </x-form.index>
            <a href="{{ route('auth.register.create') }}" class="m-auto mt-3">Регистрация</a>
        </x-form.small>
    </div>
@endsection
