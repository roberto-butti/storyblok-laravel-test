@props(['blok'])

@php
    $url = $blok['link']['cached_url'] ?? $blok['link']['url'] ?? '#';
    $label = $blok['label'] ?? 'Click here';

    $colorClass = match($blok['color'] ?? 'primary') {
        'secondary' => 'btn-secondary',
        'accent' => 'btn-accent',
        'neutral' => 'btn-neutral',
        'info' => 'btn-info',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'error' => 'btn-error',
        'ghost' => 'btn-ghost',
        'link' => 'btn-link',
        default => 'btn-primary',
    };

    $sizeClass = match($blok['size'] ?? 'medium') {
        'small' => 'btn-sm',
        'large' => 'btn-lg',
        default => '',
    };
@endphp

<a @storyblokEditable($blok)
    href="{{ $url }}"
    class="btn {{ $colorClass }} {{ $sizeClass }}"
>
    {{ $label }}
</a>
