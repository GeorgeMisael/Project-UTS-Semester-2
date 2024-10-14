@props([
  'type' => 'submit',
  'as' => 'button'
])

@if ($as == 'button')

<button type="{{ $type }}" {{ $attributes }}
        class="btn btn-primary me-2">
        
        {{ $slot }}
      
</button>

@else
<a {{ $attributes }}
        class="btn btn-primary me-2">
        
        {{ $slot }}
      
</a>
@endif