<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('settings.update-profile-form')

            <x-section-hline />

            @include('settings.update-password-form')

            <x-section-hline />

            @include('settings.delete-account-form')

        </div>
    </div>
</x-app-layout>
