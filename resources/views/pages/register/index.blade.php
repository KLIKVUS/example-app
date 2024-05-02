@extends('layouts.base')

@section('page.title', __('Регистрация'))

@section('content')
    <div class="row">
        <x-form.small name="Регистрация">
            <x-form.index
                method="POST"
                :action="route('auth.register.store')"
                btnText="Войти"
            >
                <div class="mb-3">
                    <label
                        for="login"
                        class="form-label"
                    >Логин: <span class="text-danger">*</span></label>
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
                    >Пароль: <span class="text-danger">*</span></label>
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
            <a href="{{ route('auth.login.create') }}" class="m-auto mt-3">Аунтефикация</a>
        </x-form.small>
    </div>
@endsection
