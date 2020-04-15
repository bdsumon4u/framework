@extends('shopper::layouts.'. config('shopper.theme'))
@section('title', __('Create product'))

@section('content')

    <x:breadcrumb>
        <a href="{{ route('shopper.products.index') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">{{ __('products') }}</a>
        <svg class="flex-shrink-0 mx-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
        </svg>
        <span class="text-primary-text">{{ __('Create product') }}</span>
    </x:breadcrumb>

    <div class="mt-4 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-primary-text sm:text-3xl sm:leading-9 sm:truncate pb-4">{{ __('Create product') }}</h2>
        </div>
    </div>

    {!! Form::open(['route' => 'shopper.products.store', 'files' => true]) !!}
        <div class="flex flex-col lg:flex-row mt-4">
            <div class="w-full lg:w-2/3 space-y-4">
                <div class="bg-white p-4 shadow rounded-md">
                    <div class="w-full mb-3">
                        <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            {!! Form::text('name', null, [
                                    'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out',
                                    'placeholder' => 'e.g.: MackBook Retina 16',
                                    'id' => 'name',
                                    'autocomplete' => 'off'
                                ])
                            !!}
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="description" class="block text-sm font-medium leading-5 text-gray-700">Description</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <div id="editor"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 shadow rounded-md">
                    <h4 class="text-gray-500 font-medium pb-6 text-base">{{ __('Pricing') }}</h4>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Price") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::text('price', null, [
                                        'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'price',
                                        'autocomplete' => 'off',
                                        'placeholder' => '0.00'
                                    ])
                                !!}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm sm:leading-5">{{ shopper_currency() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="max_price" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Max Price") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::text('max_price', null, [
                                        'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'max_price',
                                        'autocomplete' => 'off',
                                        'placeholder' => '0.00'
                                    ])
                                !!}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm sm:leading-5">{{ shopper_currency() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 mt-4 grid grid-cols-6 gap-2 pt-3">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="min_price" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Min Price") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::text('min_price', null, [
                                        'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'min_price',
                                        'autocomplete' => 'off',
                                        'placeholder' => '0.00'
                                    ])
                                !!}
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm sm:leading-5">{{ shopper_currency() }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="col-span-6 text-sm text-gray-400">{{ __("To allow negotiation on a product, compare the original price of the product with the minimum amount accepted. (Customers won’t see this)") }}</p>
                    </div>
                </div>
                <div class="bg-white shadow rounded-md overflow-hidden">
                    <div class="p-4">
                        <h4 class="text-gray-500 font-medium pb-6 text-base">{{ __('Inventory') }}</h4>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="sku" class="block text-sm font-medium leading-5 text-gray-700">{{ __("SKU (Stock Keeping Unit)") }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::text('sku', null, [
                                            'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out',
                                            'id' => 'sku',
                                            'autocomplete' => 'off',
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="sku" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Barcode (ISBN, UPC, GTIN, etc.)") }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    {!! Form::text('sku', null, [
                                            'class' => 'form-input block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out',
                                            'id' => 'sku',
                                            'autocomplete' => 'off',
                                        ])
                                    !!}
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="quantity" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Quantity") }}</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <span id="input-number"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow rounded-md overflow-hidden">
                    <div class="p-4">
                        <h4 class="text-gray-500 font-medium pb-6 text-base">{{ __('Shipping') }}</h4>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <label class="inline-flex items-center text-sm font-medium leading-5 text-gray-700">{{ __("Actions") }}</label>
                                <div class="mt-2 relative flex items-center space-x-6">
                                    <div class="flex items-center">
                                        <span x-data="{ value: false, toggle() { this.value = !this.value }, focused: false }" @focus="focused = true" @blur="focused = false" class="relative inline-flex items-center justify-center flex-shrink-0 h-5 w-10 cursor-pointer focus:outline-none" role="checkbox" tabindex="0" @click="toggle()" @keydown.space.prevent="toggle()" :aria-checked="value.toString()">
                                            <input type="hidden" x-model="value" name="backorder" value="">
                                            <span aria-hidden="true" :class="{ 'bg-brand-400': value, 'bg-gray-200': !value }" class="absolute h-4 w-9 mx-auto rounded-full transition-colors ease-in-out duration-200"></span>
                                            <span aria-hidden="true" :class="{ 'translate-x-5': value, 'translate-x-0': !value, 'shadow-outline-brand border-brand-100': focused }" class="absolute left-0 inline-block h-5 w-5 border border-gray-200 rounded-full bg-white shadow transform transition-transform ease-in-out duration-200"></span>
                                        </span>
                                        <span class="text-gray-500 ml-2 text-base">{{ __("This product can be returned") }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span x-data="{ value: false, toggle() { this.value = !this.value }, focused: false }" @focus="focused = true" @blur="focused = false" class="relative inline-flex items-center justify-center flex-shrink-0 h-5 w-10 cursor-pointer focus:outline-none" role="checkbox" tabindex="0" @click="toggle()" @keydown.space.prevent="toggle()" :aria-checked="value.toString()">
                                            <input type="hidden" x-model="value" name="requires_shipping" value="">
                                            <span aria-hidden="true" :class="{ 'bg-brand-400': value, 'bg-gray-200': !value }" class="absolute h-4 w-9 mx-auto rounded-full transition-colors ease-in-out duration-200"></span>
                                            <span aria-hidden="true" :class="{ 'translate-x-5': value, 'translate-x-0': !value, 'shadow-outline-brand border-brand-100': focused }" class="absolute left-0 inline-block h-5 w-5 border border-gray-200 rounded-full bg-white shadow transform transition-transform ease-in-out duration-200"></span>
                                        </span>
                                        <span class="text-gray-500 ml-2 text-base">{{ __("This product will be shipped") }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/3 space-y-4 mt-4 lg:mt-0 lg:ml-6">
                <div class="shadow rounded-md">
                    <div class="bg-white p-4">
                        <h4 class="text-gray-500 font-medium text-base">{{ __('Product Availability') }}</h4>
                        <p class="text-gray-400 text-sm mt-2">{{ __('Specify the date of availability of this product. If nothing is specified, today\'s date will be filled.') }}</p>
                    </div>
                    <x:datetime-picker />
                </div>

                <div class="bg-white p-4 shadow rounded-md">
                    <h4 class="text-gray-500 font-medium pb-6 text-base">{{ __('Product Preview') }}</h4>
                    <div id="dropzone-simple"></div>
                </div>

                <div class="bg-white p-4 shadow rounded-md">
                    <h4 class="text-gray-500 font-medium pb-6 text-base">{{ __('Associations') }}</h4>
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6">
                            <label for="brand_id" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Brand") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::select('brand_id', $brands, null, [
                                        'class' => 'form-select block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'brand_id',
                                        'autocomplete' => 'off',
                                        'placeholder' => __("No brand...")
                                    ])
                                !!}
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="categories" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Categories") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::select('categories[]', $categories, null, [
                                        'class' => 'form-select select-2 block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'categories',
                                        'autocomplete' => 'off',
                                        'multiple' => true
                                    ])
                                !!}
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="collections" class="block text-sm font-medium leading-5 text-gray-700">{{ __("Collections") }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                {!! Form::select('collections[]', $collections, null, [
                                        'class' => 'form-select select-2 block w-full sm:text-sm sm:leading-5 transition duration-150 ease-in-out pr-12',
                                        'id' => 'collections',
                                        'autocomplete' => 'off',
                                        'multiple' => true
                                    ])
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t pt-5 border-gray-200">
            <div class="flex justify-end">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </div>
    {!! Form::close() !!}

@endsection