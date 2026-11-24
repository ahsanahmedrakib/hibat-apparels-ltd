@props(['product', 'index' => 0])

<a
    href="{{ route('products') }}#{{ $product['slug'] }}"
    class="product-card group relative block overflow-hidden rounded-3xl bg-brand-950 shadow-card focus-visible:outline-none"
    aria-label="{{ $product['name'] }} - view product category"
>
    <div class="product-media relative aspect-[4/3] overflow-hidden">
        <img
            src="{{ asset($product['image']) }}"
            alt="{{ $product['name'] }} manufactured by {{ config('site.name') }}"
            loading="lazy"
            decoding="async"
            class="h-full w-full object-cover opacity-95"
        >

        <div class="absolute inset-0 bg-gradient-to-t from-brand-950 via-brand-950/55 to-brand-950/5"></div>

        <div class="absolute inset-x-0 top-0 flex items-center justify-between p-4 sm:p-5">
            <span class="grid h-10 w-10 place-items-center rounded-full glass-dark text-white sm:h-11 sm:w-11">
                <x-icon :name="$product['icon']" class="h-4 w-4 sm:h-5 sm:w-5" />
            </span>
            <span class="text-[0.65rem] font-semibold tracking-[0.22em] text-white/55">
                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
            </span>
        </div>

        <div class="absolute inset-x-0 bottom-0 p-4 sm:p-5">
            <h3 class="font-display text-xl font-semibold text-white sm:text-2xl">{{ $product['name'] }}</h3>

            @if (! empty($product['children']))
                <p class="mt-1 line-clamp-1 text-[0.7rem] tracking-wide text-white/65">
                    {{ implode(' · ', $product['children']) }}
                </p>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <span class="text-[0.6rem] font-semibold tracking-[0.2em] text-brand-200 uppercase">Explore category</span>
                <span class="product-arrow grid h-8 w-8 place-items-center rounded-full bg-white/10 text-white sm:h-9 sm:w-9">
                    <x-icon name="arrow-up-right" class="h-4 w-4" />
                </span>
            </div>
        </div>
    </div>
</a>
