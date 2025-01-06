{{-- <button 
    type="{{ $type ?? 'button' }}" 
    class="btn {{ $class ?? 'btn-primary' }} " 
    @isset($onclick) onclick="{{ $onclick }}" @endisset>
    {{ $slot }}
</button> --}}
<button {{ $attributes->merge(['class' => 'px-4 py-2 rounded-md text-white bg-primary hover:bg-opacity-90 shadow-md']) }}>
    {{ $slot }}
</button>
