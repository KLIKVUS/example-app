@props([
    'method' => 'GET',
    'action',
    'btnText' => 'Отправить',
    'btnType' => 'primary',
    'btnIsDisabled' => false,
])

@php($method = strtoupper($method))
@php($_method = in_array($method, ['GET', 'POST']))

<form
    method="{{ $_method ? $method : 'POST' }}"
    action="{{ $action }}"
    {{ $attributes }}
>
    @unless ($_method)
        @method($method)
    @endunless

    @if ($method !== 'GET')
        @csrf
    @endif

    {{ $slot }}

    <button
        type="submit"
        class="btn btn-{{ $btnType }} w-100"
        {{ $btnIsDisabled ? 'disabled' : '' }}
    >{{ $btnText }}</button>
</form>
