@props(['blok'])

@php
    $layout = $blok['layout'] ?? 'image_right';
    $bgColor = $blok['background_color'] ?? 'base-200';
    $textColor = $blok['text_color'] ?? 'auto';
    $textAlignment = $blok['text_alignment'] ?? 'left';

    $minHeight = match($blok['min_height'] ?? 'medium') {
        'small' => 'min-h-[300px]',
        'large' => 'min-h-[600px]',
        'full' => 'min-h-screen',
        default => 'min-h-[450px]',
    };

    $bgClass = match($bgColor) {
        'base-100' => 'bg-base-100',
        'base-200' => 'bg-base-200',
        'neutral' => 'bg-neutral',
        'primary' => 'bg-primary',
        'secondary' => 'bg-secondary',
        default => 'bg-base-200',
    };

    $textClass = match($textColor) {
        'light' => 'text-white',
        'dark' => 'text-base-content',
        default => match($bgColor) {
            'neutral' => 'text-neutral-content',
            'primary' => 'text-primary-content',
            'secondary' => 'text-secondary-content',
            default => 'text-base-content',
        },
    };

    $alignClass = $textAlignment === 'center' ? 'text-center items-center' : 'text-left items-start';
    $isBackground = $layout === 'image_background';
    $isCentered = $layout === 'centered';
@endphp

<section @storyblokEditable($blok)
    class="{{ $minHeight }} {{ $bgClass }} {{ $textClass }} {{ $isBackground ? 'hero' : '' }}"
    @if($isBackground && !empty($blok['image']['filename']))
        style="background-image: url('{{ $blok['image']['filename'] }}/m/1600x0/filters:quality(80)');"
    @endif
>
    @if($isBackground)
        <div class="hero-overlay bg-black/50"></div>
    @endif

    <div class="{{ $isBackground ? 'hero-content' : 'container mx-auto px-6 h-full' }} flex items-center {{ $minHeight }}">
        @if($isBackground || $isCentered)
            {{-- Centered / Background layout --}}
            <div class="flex flex-col {{ $alignClass }} max-w-2xl {{ $textAlignment === 'center' ? 'mx-auto' : '' }}">
                @if(!empty($blok['headline']))
                    <h1 class="text-5xl font-bold leading-tight">{{ $blok['headline'] }}</h1>
                @endif

                @if(!empty($blok['subheadline']))
                    <p class="mt-4 text-lg opacity-80">{{ $blok['subheadline'] }}</p>
                @endif

                @if(!empty($blok['buttons']))
                    <div class="flex flex-wrap gap-4 mt-8 {{ $textAlignment === 'center' ? 'justify-center' : '' }}">
                        @foreach($blok['buttons'] as $button)
                            <x-storyblok-component :blok="$button" />
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            {{-- Split layout: image_right / image_left --}}
            <div class="flex flex-col {{ $layout === 'image_left' ? 'lg:flex-row-reverse' : 'lg:flex-row' }} gap-12 items-center w-full">
                <div class="lg:w-1/2 flex flex-col {{ $alignClass }}">
                    @if(!empty($blok['headline']))
                        <h1 class="text-5xl font-bold leading-tight">{{ $blok['headline'] }}</h1>
                    @endif

                    @if(!empty($blok['subheadline']))
                        <p class="mt-4 text-lg opacity-80">{{ $blok['subheadline'] }}</p>
                    @endif

                    @if(!empty($blok['buttons']))
                        <div class="flex flex-wrap gap-4 mt-8">
                            @foreach($blok['buttons'] as $button)
                                <x-storyblok-component :blok="$button" />
                            @endforeach
                        </div>
                    @endif
                </div>

                @if(!empty($blok['image']['filename']))
                    <div class="lg:w-1/2">
                        <x-storyblok::image
                            :image="$blok['image']"
                            sizes="(max-width: 1024px) 100vw, 50vw"
                            :widths="[400, 600, 800, 1200]"
                            :ratio="4/3"
                            class="rounded-lg shadow-2xl w-full"
                            loading="eager"
                            fetchpriority="high"
                        />
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>
