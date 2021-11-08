@props(['submit', 'action', 'method', 'confirmation'])

@php
$confirm = $confirmation ?? false ? "return confirm('Are you sure?')" : '';
@endphp

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ $action }}" method="POST" onsubmit="{{ $confirm }}">
            @csrf
            @method($method ?? 'POST')

            @isset($form)
                <div
                    class="px-4 py-5 bg-white sm:p-6 border border-gray-300 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                    <div class="grid grid-cols-6 gap-6">
                        {{ $form }}
                    </div>
                </div>
            @endisset

            @isset($content)
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="px-4 py-5 bg-white sm:p-6 border border-gray-300 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                        {{ $content }}
                    </div>
                </div>
            @endisset

            @if (isset($actions))
                <div
                    class="flex items-center justify-end px-4 py-4 bg-gray-50 text-right sm:px-6 border-b border-l border-r border-gray-300 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
