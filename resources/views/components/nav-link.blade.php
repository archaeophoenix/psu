@props(['ti', 'active' => false])

<li class="pc-item {{ $active ? 'pc-active' : '' }}">
    <a {{ $attributes }} class="pc-link">
        <span class="pc-micon">
            <i class="ti ti-{{ $ti }}"></i>
        </span>
        <span class="pc-mtext">{{ $slot }}</span>
    </a>
</li>
