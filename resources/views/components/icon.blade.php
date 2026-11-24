@props(['name', 'class' => 'h-5 w-5', 'strokeWidth' => '1.6'])

@php
    $icons = [
        'arrow-right' => '<path d="M4 12h15m0 0-6-6m6 6-6 6"/>',
        'arrow-left' => '<path d="M20 12H5m0 0 6-6m-6 6 6 6"/>',
        'arrow-up-right' => '<path d="M7 17 17 7M9 7h8v8"/>',
        'arrow-down' => '<path d="M12 4v15m0 0 6-6m-6 6-6-6"/>',
        'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
        'chevron-right' => '<path d="m9 6 6 6-6 6"/>',
        'menu' => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'close' => '<path d="M6 6l12 12M18 6 6 18"/>',
        'mail' => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'phone' => '<path d="M6.6 3h2.2l1.4 4-2 1.4a12 12 0 0 0 6.4 6.4l1.4-2 4 1.4v2.2a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4.6 5.2 2 2 0 0 1 6.6 3Z"/>',
        'map-pin' => '<path d="M12 21s7-5.4 7-11a7 7 0 1 0-14 0c0 5.6 7 11 7 11Z"/><circle cx="12" cy="10" r="2.6"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'check' => '<path d="m5 12.5 4.2 4.2L19 7"/>',
        'check-circle' => '<circle cx="12" cy="12" r="9"/><path d="m8 12.3 2.7 2.7L16.2 9.5"/>',
        'shield' => '<path d="M12 3 5 6v5.5c0 4.6 3 8 7 9.5 4-1.5 7-4.9 7-9.5V6l-7-3Z"/><path d="m8.8 12 2.2 2.2 4.4-4.4"/>',
        'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3.5 9h17M3.5 15h17"/><path d="M12 3c2.4 2.4 3.7 5.4 3.7 9s-1.3 6.6-3.7 9c-2.4-2.4-3.7-5.4-3.7-9S9.6 5.4 12 3Z"/>',
        'truck' => '<path d="M3 6h10v9H3zM13 9h4l3 3v3h-7"/><circle cx="7" cy="18" r="1.8"/><circle cx="17" cy="18" r="1.8"/>',
        'package' => '<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/><path d="m4 7.5 8 4.5 8-4.5M12 12v9"/>',
        'layers' => '<path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5"/><path d="m3 16 9 5 9-5"/>',
        'users' => '<circle cx="9" cy="8" r="3"/><path d="M3 20a6 6 0 0 1 12 0"/><path d="M16 5.2A3 3 0 0 1 16 11m1 3a5 5 0 0 1 4 5"/>',
        'sparkles' => '<path d="M12 3.5 13.6 8l4.4 1.6-4.4 1.6L12 15.8l-1.6-4.6L6 9.6 10.4 8 12 3.5Z"/><path d="M18.5 14.5 19.3 17l2.2.8-2.2.8-.8 2.4-.8-2.4-2.2-.8 2.2-.8.8-2.5Z"/>',
        'factory' => '<path d="M3 21V9.5l5 3v-3l5 3V4h4v8l4 2.5V21H3Z"/><path d="M7 17h2M12 17h2M17 17h1"/>',
        'office' => '<path d="M4 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"/><path d="M16 9h3a1 1 0 0 1 1 1v11M2 21h20M8 7h1m3 0h1M8 11h1m3 0h1M8 15h1m3 0h1"/>',
        'target' => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1" fill="currentColor" stroke="none"/>',
        'handshake' => '<path d="M4 11l4-4 3 3 3-3 6 6"/><path d="M4 11v4l3 3 3-3"/><path d="M20 11v4l-3 3-2-2"/><path d="m11 14 2 2"/>',
        'star' => '<path d="m12 3.5 2.6 5.3 5.9.9-4.3 4.1 1 5.8-5.2-2.8-5.2 2.8 1-5.8L3.5 9.7l5.9-.9L12 3.5Z"/>',
        'send' => '<path d="M21 3 10.5 13.5M21 3l-7 18-3.5-7.5L3 10l18-7Z"/>',
        'external' => '<path d="M14 4h6v6M20 4l-8 8"/><path d="M18 14v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4"/>',
        'plus' => '<path d="M12 5v14M5 12h14"/>',
        'facebook' => '<path d="M14 8h3V4.5h-3A4 4 0 0 0 10 8.5V11H7v3.5h3V21h4v-6.5h3l.5-3.5H14V9a1 1 0 0 1 1-1Z" fill="currentColor" stroke="none"/>',
        'instagram' => '<rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17" cy="7" r="1" fill="currentColor" stroke="none"/>',
        'linkedin' => '<rect x="3.5" y="3.5" width="17" height="17" rx="3"/><path d="M7.5 10v7M7.5 7.2v.1M11.5 17v-4a2.5 2.5 0 0 1 5 0v4"/>',
        'outerwear' => '<path d="m9 4-4 2-2 4 3 1v9h12v-9l3-1-2-4-4-2"/><path d="M9 4a3 3 0 0 0 6 0M12 7v13M9 16h2m2 0h2"/>',
        'workwear' => '<path d="M4 16v-2a8 8 0 0 1 16 0v2"/><path d="M2.5 16h19v3h-19z"/><path d="M10 6V3h4v3"/>',
        'uniform' => '<path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3Z"/>',
        'jacket' => '<path d="M8 4 4 6 2 11l3 1v8h14v-8l3-1-2-5-4-2"/><path d="M8 4v4M16 4v4M8 9h8M12 9v11M9 16h2m2 0h2"/>',
        'denim' => '<path d="M7 3h10l1 18h-4l-2-9-2 9H6L7 3Z"/><path d="M7 6h10M12 3v4"/>',
        'twill' => '<path d="m4 15 11-11 5 5L9 20l-5-5Z"/><path d="m9 10 1.5 1.5M12 7l1.5 1.5M6 13l1.5 1.5"/>',
        'knit' => '<path d="M9 4 4 7l2 4 2-1v10h8V10l2 1 2-4-5-3"/><path d="M9 4c0 2 1.3 3 3 3s3-1 3-3M8 13h8"/>',
        'sock' => '<path d="M7 3h7v8.5c0 1.6-.7 3.1-2 4l-2 1.6a3.5 3.5 0 0 1-5.5-4.2L7 10V3Z"/><path d="M7 6h7"/>',
        'backpack' => '<path d="M6 9a6 6 0 0 1 12 0v10a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V9Z"/><path d="M9 9V7a3 3 0 0 1 6 0v2M9 13h6v4H9zM6 12H4m16 0h-2"/>',
        'accessories' => '<path d="M3 12V5a2 2 0 0 1 2-2h7l9 9-9 9-9-9Z"/><circle cx="7.5" cy="7.5" r="1.2" fill="currentColor" stroke="none"/>',
    ];
@endphp

@if (isset($icons[$name]))
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="{{ $strokeWidth }}"
        stroke-linecap="round"
        stroke-linejoin="round"
        aria-hidden="true"
        {{ $attributes->merge(['class' => $class]) }}
    >
        {!! $icons[$name] !!}
    </svg>
@endif
