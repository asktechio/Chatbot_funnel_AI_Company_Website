@props(['status'])
@php
    $colors = [
        'active' => 'bg-amber-100 text-amber-700',
        'lead_captured' => 'bg-blue-100 text-blue-700',
        'demo_booked' => 'bg-green-100 text-green-700',
        'abandoned' => 'bg-red-100 text-red-700',
    ];
@endphp
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $colors[$status] ?? 'bg-slate-100 text-slate-700' }}">
    {{ str_replace('_', ' ', ucfirst($status)) }}
</span>
