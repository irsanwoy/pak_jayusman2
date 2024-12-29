<button 
    type="{{ $type ?? 'button' }}" 
    class="btn {{ $class ?? 'btn-primary' }}" 
    @isset($onclick) onclick="{{ $onclick }}" @endisset>
    {{ $slot }}
</button>
