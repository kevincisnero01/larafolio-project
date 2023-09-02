@props(['items' => null])

@foreach($items as $item)
    <a href="{{ $item->link }}"  {{ $attributes->merge(['font-medium']) }}>{{ $item->label }}</a>
@endforeach