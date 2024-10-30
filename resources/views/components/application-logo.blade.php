@props(['width' => 100, 'height' => 100])

<img src="{{ asset('assets/images/logo-tourbinou.svg') }}" width="{{ $width }}" height="{{ $height }}" {{ $attributes }} alt="Logo" />
