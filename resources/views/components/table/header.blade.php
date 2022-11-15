@props([
    'label' => null,
    'field' => null,
    'sortField' => null,
    'sortDirection' => null,
])

<th {{ $attributes->merge(['class' => 'hidden px-3 py-3 text-left text-sm font-semibold text-gray-900 sm:table-cell']) }} @if ($sortField) wire:click="sortBy('{{ $field }}')" style="cursor: pointer" @endif>
    {{ $label }}
    @if (isset($sortField, $sortDirection, $field) && $sortField === $field)
        &nbsp;
        <i class="fa-solid fa-caret-{{ $sortDirection === 'asc' ? 'up' : 'down' }}" style="font-size: 0.8rem;"></i>
    @endif
</th>
