@props(['type' => 'default', 'message'])

@php
    // Define classes for different types and a default case
    $classes = [
        'success' => 'bg-green-100 border-green-500 text-green-700',
        'error' => 'bg-red-100 border-red-500 text-red-700',
        'default' => 'bg-gray-100 border-gray-500 text-gray-700', // Neutral/default style
    ][$type] ?? 'bg-gray-100 border-gray-500 text-gray-700'; // Fallback to default style
@endphp

<div x-data="{ open: true }" x-show="open"
     x-init="setTimeout(() => open = false, 5000)"
     class="flex p-4 border rounded mb-4 {{ $classes }} transition-opacity duration-500 ease-in-out"
     role="alert">
    <div class="flex-1">
        {{ $message }}
    </div>
    <button @click="open = false" class="ml-4 text-lg focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>
