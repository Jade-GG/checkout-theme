<div class="bg-ct-inactive-100 mt-5 rounded py-4 text-sm">
    <div class="flex w-full items-center gap-x-6 pr-6 text-xs">
        <div class="sm:w-40"></div>
        <div class="sm:w-40">@lang('Product')</div>
        <div class="ml-auto flex items-center gap-10 max-md:hidden">
            <div class="w-16">@lang('Price')</div>
            <div class="w-32 text-center">@lang('Amount')</div>
            <div class="w-16">@lang('Subtotal')</div>
        </div>
    </div>
</div>

<ul>
    <li
        class="flex border-b py-5"
        v-for="(item, itemId, index) in cart.items"
    >
        <div class="flex w-full flex-wrap gap-x-3 gap-y-3 text-sm sm:gap-x-6 sm:pr-6 md:items-center">
            <div class="h-24 flex w-40 items-center justify-center">
                <img
                    class="h-24 w-40 object-contain"
                    :alt="item.name"
                    :src="'/storage/{{ config('rapidez.store') }}/resizes/200/magento/catalog/product' + item.image + '.webp'"
                    height="100"
                    v-if="item.image"
                >
                <x-rapidez::no-image
                    class="h-24 w-40"
                    v-else
                />
            </div>
            <div class="flex w-40 flex-col items-start sm:flex-1">
                <a
                    :href="item.url | url"
                    dusk="cart-item-name"
                >@{{ item.name }}</a>
                <div v-for="(optionValue, option) in item.options">
                    @{{ option }}: @{{ optionValue }}
                </div>
                <div v-for="option in cart?.items2?.find((item) => item.item_id == itemId).options.filter((option) => !['info_buyRequest', 'option_ids'].includes(option.code) && option.label)">
                    @{{ option.label }}: @{{ option.value.title || option.value }}
                </div>
                <button
                    class="text-ct-inactive mt-1 text-xs hover:underline"
                    @click="remove(item)"
                    :dusk="'item-delete-' + index"
                >
                    @lang('Remove')
                </button>
            </div>
            <div class="flex items-center justify-between gap-10 font-medium max-sm:flex-1 sm:ml-auto">
                <div class="text-sm sm:w-16">
                    @{{ item.price | price }}
                </div>
                <div class="flex w-32 items-center justify-center">
                    <x-rapidez-ct::input.quantity />
                </div>
                <div class="text-sm sm:w-16">
                    @{{ item.total | price }}
                </div>
            </div>
        </div>
    </li>
</ul>
