@extends('products.layouts.marketplace')

@section('header', __('Create a new product'))

@section('content')
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("The product will have to be validated before being submitted to the marketplace.") }}
            </div>
        </div>
        <form method="POST" action="{{ route('products.store') }}" class="grid grid-cols-4 gap-4" autocomplete="off">
            <input type="text" style="display:none">
            <input type="password" style="display:none">
            @csrf
            <div class="col-span-2">
                <x-input-label for="product-name" value="Product name"/>
                <x-text-input
                    type="text"
                    name="name"
                    id="product-name"
                    placeholder="Product name"
                    class="w-full"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <div x-data="{ value: 0 }">
                <x-input-label for="product-price" value="Price"/>
                <x-text-input
                    type="number"
                    name="price"
                    id="product-price"
                    placeholder="10.00$"
                    class="w-full"
                />
                <input type="hidden" name="price" x-model="value"/>
                <x-input-error :messages="$errors->get('price')" class="mt-2"/>
            </div>
            <div>
                <x-input-label for="product-stock" value="Stock"/>
                <x-text-input
                    type="number"
                    type="text"
                    name="stock"
                    id="product-stock"
                    placeholder="Unlimited"
                    class="w-full"
                />
                <x-input-error :messages="$errors->get('stock')" class="mt-2"/>
            </div>
            <div class="col-span-4">
                <x-input-label for="product-description" value="Product description"/>
                <textarea
                    name="description"
                    id="product-description"
                    placeholder="Explain the product in a few words..."
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('message') }}</textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2"/>
            </div>
            <label class="h-full flex items-center gap-2 col-span-2 px-2">
                <input type="checkbox" name="active"/>
                <span>Make product public after validation</span>
            </label>
            <div>
                <x-text-input
                    type="password"
                    name="confirm_password"
                    id="product-stock"
                    placeholder="Confirm your password"
                    class="w-full"
                />
                <x-input-error :messages="$errors->get('stock')" class="mt-2"/>
            </div>
            <x-ui.button.primary type="submit">
                {{ __('Submit') }}
            </x-ui.button.primary>
        </form>
    </div>
@endsection
