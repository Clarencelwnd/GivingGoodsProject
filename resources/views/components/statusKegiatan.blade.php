{{-- resources/views/components/status-indicator.blade.php --}}
@props(['status'])

@php
    $badgeClass = 'badge text-bg-warning rounded-pill';
    $statusText = '';

    switch($status) {
        case 'akan datang':
            $badgeClass = 'badge text-bg-primary rounded-pill';
            $statusText = 'Akan Datang';
            break;
        case 'sedang berlangsung':
            $badgeClass = 'badge text-bg-success rounded-pill';
            $statusText = 'Sedang Berlangsung';
            break;
        case 'selesai':
            $badgeClass = 'badge text-bg-secondary rounded-pill';
            $statusText = 'Selesai';
            break;
    }
@endphp

<span class="{{ $badgeClass }}">{{ $statusText }}</span>
