@props(['name'])

@php
    $path = public_path("icons/{$name}.svg");
@endphp

@if(file_exists($path))
    {!! file_get_contents($path.$name."svg") !!}
@else
    <!-- fallback if not found -->
    <svg class="w-5 h-5 text-red-600"><text x="0" y="15">?</text></svg>
@endif
