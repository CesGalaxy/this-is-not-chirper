@props([
    'color' => 'primary',
    'variant' => 'solid',
])

@php
    $colorSolidClasses = [
        'primary' => 'text-white bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'secondary' => 'text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-25 focus:ring-indigo-500 shadow-sm',
        'danger' => 'text-white bg-red-600 hover:bg-red-500 active:bg-red-700 focus:ring-red-500'
//        'blue' => 'bg-blue-600 hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700',
//        'red' => 'bg-red-600 hover:bg-red-500 focus:bg-red-500 active:bg-red-700',
//        'green' => 'bg-green-600 hover:bg-green-500 focus:bg-green-500 active:bg-green-700',
    ][$color];

    $colorLightClasses = [
        'primary' => 'text-gray-800 hover:text-gray-700 active:text-gray-900 focus:ring-indigo-500 hover:bg-gray-200',
        'secondary' => 'text-gray-700 bg-white hover:bg-gray-100 disabled:opacity-25 focus:ring-indigo-500',
        'danger' => 'text-red-600 hover:text-red-700 hover:bg-red-50 focus:ring-indigo-500'
    ][$color];

    $colorBorder = [
        'primary' => $variant == 'outline' ? 'border-gray-800' : 'border-transparent',
        'secondary' => $variant == 'light' ? 'border-transparent' : 'border-gray-300',
        'danger' => $variant == 'outline' ? 'border-red-600' : 'border-transparent'
    ][$color];

    $variantClasses = [
        'solid' => "border $colorSolidClasses $colorBorder",
        'outline' => "border $colorBorder",
        'light' => "border $colorLightClasses $colorBorder",
    ][$variant];

    $classes = 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs uppercase tracking-widest';
    $focusClasses = 'focus:outline-none focus:ring-2 focus:ring-offset-2';
@endphp

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => "$classes $focusClasses transition ease-in-out duration-150 $variantClasses"
]) }}>
    {{ $slot }}
</button>
