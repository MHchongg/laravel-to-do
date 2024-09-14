@props(['type' => 'info', 'message' => ''])

@php
    $alertClasses = [
        'info' => 'bg-blue-500',
        'danger' => 'bg-red-500',
        'success' => 'bg-green-500',
        'warning' => 'bg-yellow-500',
    ];

    // Generate a unique ID for each alert to target it with JavaScript
    $alertId = uniqid('alert-', true);
@endphp

<div id="{{ $alertId }}"
    class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 text-sm rounded-lg text-white font-bold shadow-lg z-50 {{ $alertClasses[$type] }}"
    role="alert">
    {{ $message }}
</div>

<script>
    setTimeout(function() {
        let alert = document.getElementById('{{ $alertId }}');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000); // Auto-dismiss after 5 seconds
</script>
