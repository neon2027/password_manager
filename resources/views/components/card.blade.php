<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md']) }}>
    <!-- Card header -->
    @isset($header)
        <div class="p-6 py-8 border-b">
            {{ $header }}
        </div>
    @endisset
    <!-- Card body -->
    @isset($content)
        <div class="p-12 px-8">
            {{ $content }}
        </div>
    @endisset
</div>
