@props(['status'])

@php
    $variant = match (strtolower($status)) {
        'aman'    => ['label' => 'Aman',    'class' => 'bg-green-100 text-green-700'],
        'menipis' => ['label' => 'Menipis', 'class' => 'bg-yellow-100 text-yellow-700'],
        'habis'   => ['label' => 'Habis',   'class' => 'bg-red-100 text-red-700'],
        default   => ['label' => $status,   'class' => 'bg-gray-100 text-gray-700'],
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex px-2 py-0.5 text-xs font-semibold rounded-full ' . $variant['class']]) }}>
    {{ $variant['label'] }}
</span>